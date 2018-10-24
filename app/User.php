<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
//Notification for Seller
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements CanResetPassword
{
    protected $guard = 'user';
    protected $table = 'users';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
      {
          $this->notify(new ResetPasswordNotification($token));
      }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
