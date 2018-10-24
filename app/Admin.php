<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Authenticatable
{
	protected $guard = 'admin';
    protected $table = 'admin';
    protected $fillable = [
        'name', 'email','username', 'password',
    ];
    
}
