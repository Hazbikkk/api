<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentsController;
use App\Http\Controllers\Api\PostsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students', [StudentsController::class, 'index'])->name('api.students.index')
->middleware('auth:sanctum')->middleware('api:throttle');
Route::post('/students/store', [StudentsController::class, 'store'])->name('api.students')
->middleware('auth:sanctum')->middleware('api:throttle');
Route::get('/students/{id}', [StudentsController::class, 'show'])->name('api.students.show')
->middleware('auth:sanctum')->middleware('api:throttle');
Route::put('/students/{id}', [StudentsController::class, 'update'])->name('api.students.update')
->middleware('auth:sanctum')->middleware('api:throttle');
Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('api.students.destroy')
->middleware('auth:sanctum')->middleware('api:throttle');

Route::apiResource('/posts', PostsController::class);