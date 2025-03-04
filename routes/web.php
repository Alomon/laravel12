<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

use \App\Http\Controllers\Web\AuthController;
// Регистрация
Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Аутентификация
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Выход
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:web');
