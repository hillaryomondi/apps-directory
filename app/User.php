<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Strathmore\AdminAuth\Activation\Contracts\CanActivate as CanActivateContract;
use Strathmore\AdminAuth\Activation\Traits\CanActivate;
use Strathmore\AdminAuth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CanActivateContract
{
    use Notifiable;
    use CanActivate;
    use HasRoles;
    use HasApiTokens;


    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'username',
        'first_name',
        'middle_name',
        'last_name',
        'activated',
        'last_login_at',
        'last_login_ip',

    ];

    protected $hidden = [
        'password',
        'remember_token',

    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'last_login_at',

    ];



    protected $appends = ['full_name', 'resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/users/'.$this->getKey());
    }

    public function getFullNameAttribute() {
        return $this->first_name." ".$this->last_name;
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(app( ResetPassword::class, ['token' => $token]));
    }

    /* ************************ RELATIONS ************************ */


}
