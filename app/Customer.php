<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
	// The authentication guard for admin
    protected $guard = 'customer';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'email', 'password', 'name'
    ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
