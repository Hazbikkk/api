<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // <-- ВАЖНО!
use Illuminate\Database\Eloquent\Model;

class Login extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'logins';
    protected $fillable = ['name', 'email', 'password'];
}
