<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // <-- ВАЖНО!
use Laravel\Sanctum\HasApiTokens;

class Register extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'registers';

    protected $fillable = ['name', 'email', 'password'];
}
