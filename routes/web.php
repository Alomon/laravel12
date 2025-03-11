<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CategoryController;

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

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/store', [CategoryController::class, 'showCreateForm']);
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
