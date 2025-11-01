<?php
// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentsController;
use App\Http\Controllers\Api\PostsController;

// Тестовый роут без авторизации
Route::get('/test', fn() => response()->json(['status' => 'API работает!']));

Route::middleware('auth:sanctum')->get('/user', fn(Request $request) => $request->user());

// Группа с авторизацией и троттлингом
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/students', [StudentsController::class, 'index'])
        ->name('api.students.index');
    Route::post('/students/store', [StudentsController::class, 'store'])
        ->name('api.students');
    Route::get('/students/{id}', [StudentsController::class, 'show'])
        ->name('api.students.show');
    Route::put('/students/{id}', [StudentsController::class, 'update'])
        ->name('api.students.update');
    Route::delete('/students/{id}', [StudentsController::class, 'destroy'])
        ->name('api.students.destroy');

    Route::apiResource('posts', PostsController::class);
});