<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class User extends Authenticatable
class User extends Authenticatable implements MustVerifyEmail

{
    use Notifiable;


    protected $table = 'users';
    protected $fillable =
    [
        'name',
        'email',
        'email_verified_at',
        'password'
    ];
}
