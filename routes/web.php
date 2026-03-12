<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Публичные
Route::get('/', [HomeController::class, 'index'])->name('home');

// Гость
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

// Авторизованный пользователь
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
});

// Админ
Route::middleware('admin')->group(function () {
    Route::get('/admin/applications', [\App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('admin.applications.index');
    Route::patch('/admin/applications/{application}', [\App\Http\Controllers\Admin\ApplicationController::class, 'update'])->name('admin.applications.update');
});
