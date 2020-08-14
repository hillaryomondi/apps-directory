<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repos\Users;
use App\Role;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function fixIntendedUrl() {
        \Log::info("Current intended url:". \Session::get('url.intended'));
        $intended = \Session::get('url.intended');
        $path = parse_url($intended,PHP_URL_PATH);
        $query = parse_url($intended,PHP_URL_QUERY);
        $pathAndQuery = $query ? "$path?$query":$path;
        $newBase = url('');
        \Log::info("Replace base with $newBase");
        $intended = "$newBase$pathAndQuery";
        \Log::info("New Intended: $intended");
        \Session::put('url.intended',$intended);
    }
    public function login(Request $request)
    {
        $this->fixIntendedUrl();
//        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        \Log::info("Calling cas->user");
        /*$auth = cas()->checkAuthentication();
        if (!$auth) cas()->authenticate();*/
        $username = cas()->user();//homondi
        \Log::info("User: $username is being logged in");
        try {
            $user = User::whereUsername($username)->first(); // returns null if no user.
            if (!$user) {
                $data = Users::getUserFromWs($username);
                if (!$data) abort(400, "No User details found from dataservice");
                // 3. Create a new User() and fill the user with details obtained in 2 above
                $user = new User();

                $studentRole = Role::whereName('Student')->first();
                $staffRole = Role::whereName('Staff')->first();
                if (is_numeric($username)) {
                    // Data is student
                    $user->username = $data->studentNo;
                    $user->email = $data->email;
                    $user->name = $data->studentNames;
                    $user->last_name = $data->surname;
                    $otherNames = explode(" ",$data->otherNames);
                    $user->first_name = $otherNames[0];
                    if (count($otherNames) > 1) $user->middle_name = $otherNames[1];
                    $user->dob = $data->dateOfBirth;
                    $user->gender = $data->gender;
                    $user->saveOrFail();

                    if ($studentRole) $user->assignRole([$studentRole]);
                } else {
                    // Data is staff
                    $user->username = $data->username;
                    $user->email = $data->email;
                    $user->name = $data->names;
                    $user->first_name = $data->firstName;
                    $user->middle_name = $data->middleName;
                    $user->last_name = $data->lastName;
                    $user->dob = $data->dateOfBirth;
                    $user->gender = $data->gender;
                    $user->saveOrFail();

                    if ($staffRole) $user->assignRole([$staffRole]);
                }


            }
            \Log::info("Logging in $user->username");
            \Auth::login($user);
            \Log::info("sending login response");
            return $this->sendLoginResponse($request);
        } catch (\Throwable $exception) {
            \Log::error($exception);
            $this->incrementLoginAttempts($request);
            cas()->logoutWithUrl(env('CAS_REDIRECT_PATH'));
            return $this->sendFailedLoginResponse($request);
        }
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        \Log::info("Session regenerated");
        $this->clearLoginAttempts($request);

        \Log::info("Login attempts cleared. redirecting..");
        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }
    public function username()
    {
        return 'username';
    }
    public function showLoginForm(Request $request)
    {
        return $this->login($request);
    }
    public function casCallback(Request $request) {
        \Log::info("Cas is logged on. Going to login");
        $this->login($request); //Jump to authentication
    }
    public function logout(Request $request)
    {
        $this->middleware(['cas.auth']);
        $this->guard()->logout();
        $request->session()->invalidate();
        cas()->logoutWithUrl(env('CAS_LOGOUT_REDIRECT'));
        return $this->loggedOut($request) ?: redirect('/');
    }
}
