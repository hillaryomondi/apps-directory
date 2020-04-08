<?php

namespace Strathmore\AdminAuth\Tests\Models;

use Strathmore\AdminAuth\Activation\Contracts\CanActivate as CanActivateContract;
use Strathmore\AdminAuth\Activation\Traits\CanActivate;
use Strathmore\AdminAuth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TestStandardUserModel extends Authenticatable implements CanActivateContract
{
    use Notifiable;
    use CanActivate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(app(ResetPassword::class, ['token' => $token]));
    }
}
