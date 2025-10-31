<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/register', [ApiController::class, 'register'])->name('api.register');
Route::post('/api/register', [ApiController::class, 'storeRegister'])->name('api.register.store');
Route::get('/api/login', [ApiController::class, 'login'])->name('api.login');
Route::post('/api/login', [ApiController::class, 'storeLogin'])->name('api.login.store');

Route::get('/api/token', [ApiController::class, 'token'])->name('api.token');