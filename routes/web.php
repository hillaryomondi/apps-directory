<?php

URL::forceScheme(env('FORCE_SCHEME','https'));
URL::forceRootUrl(config('app.url'));
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});
Route::group(['middleware' => 'cas.auth'], function () {
    Auth::routes(['register' => false]);
});
Route::middleware(['auth'])->any('logout',"Auth\LoginController@logout")->name('web.logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/backend', 'HomeController@backend')->name('backend');



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
            Route::get('/{user}/resend-activation',                     'UsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::get('/{role}/show',                                  'RolesController@show')->name('show');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('permissions')->name('permissions/')->group(static function() {
            Route::get('/',                                             'PermissionsController@index')->name('index');
            Route::get('/create',                                       'PermissionsController@create')->name('create');
            Route::post('/',                                            'PermissionsController@store')->name('store');
            Route::get('/{permission}/edit',                            'PermissionsController@edit')->name('edit');
            Route::get('/{permission}/show',                            'PermissionsController@show')->name('show');
            Route::post('/bulk-destroy',                                'PermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{permission}',                                'PermissionsController@update')->name('update');
            Route::delete('/{permission}',                              'PermissionsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('service-endpoints')->name('service-endpoints/')->group(static function() {
            Route::get('/',                                             'ServiceEndpointsController@index')->name('index');
            Route::get('/create',                                       'ServiceEndpointsController@create')->name('create');
            Route::post('/',                                            'ServiceEndpointsController@store')->name('store');
            Route::get('/{serviceEndpoint}/edit',                       'ServiceEndpointsController@edit')->name('edit');
            Route::get('/{serviceEndpoint}/show',                       'ServiceEndpointsController@show')->name('show');
            Route::post('/bulk-destroy',                                'ServiceEndpointsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{serviceEndpoint}',                           'ServiceEndpointsController@update')->name('update');
            Route::delete('/{serviceEndpoint}',                         'ServiceEndpointsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('departments')->name('departments/')->group(static function() {
            Route::get('/',                                             'DepartmentsController@index')->name('index');
            Route::get('/create',                                       'DepartmentsController@create')->name('create');
            Route::post('/',                                            'DepartmentsController@store')->name('store');
            Route::get('/{department}/edit',                            'DepartmentsController@edit')->name('edit');
            Route::get('/{department}/show',                            'DepartmentsController@show')->name('show');
            Route::post('/bulk-destroy',                                'DepartmentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{department}',                                'DepartmentsController@update')->name('update');
            Route::delete('/{department}',                              'DepartmentsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('su-applications')->name('su-applications/')->group(static function() {
            Route::get('/',                                             'SuApplicationsController@index')->name('index');
            Route::get('/create',                                       'SuApplicationsController@create')->name('create');
            Route::post('/',                                            'SuApplicationsController@store')->name('store');
            Route::get('/{suApplication}/edit',                         'SuApplicationsController@edit')->name('edit');
            Route::get('/{suApplication}/show',                         'SuApplicationsController@show')->name('show');
            Route::post('/bulk-destroy',                                'SuApplicationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{suApplication}',                             'SuApplicationsController@update')->name('update');
            Route::delete('/{suApplication}',                           'SuApplicationsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated web routes */
Route::middleware(['auth:' . config('auth.defaults.guard')])->group(static function () {
    Route::prefix('')->namespace('Web')->name('web/')->group(static function() {
        Route::prefix('tickets')->name('tickets/')->group(static function() {
            Route::get('/',                                             'TicketsController@index')->name('index');
            Route::get('/create',                                       'TicketsController@create')->name('create');
            Route::post('/',                                            'TicketsController@store')->name('store');
            Route::get('/{ticket}/edit',                                'TicketsController@edit')->name('edit');
            Route::get('/{ticket}/show',                                'TicketsController@show')->name('show');
            Route::post('/bulk-destroy',                                'TicketsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ticket}',                                    'TicketsController@update')->name('update');
            Route::delete('/{ticket}',                                  'TicketsController@destroy')->name('destroy');
        });
    });
});
/*
Route::get('/', function (){
    /$details = [
        'title'=>'Mail from Diana Mwaura',
        'body'=>'Testing'
    ];
    \Mail::to('ceramwauracm@gmail.com')->send(new \App\Mail\Mail($details));
    echo "Email has been successfully sent";

});
*/
