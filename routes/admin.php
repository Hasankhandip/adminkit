<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->prefix('login')->name('login.')->group(function () {
    Route::get('/', "login")->name('view');
    Route::post('/login/attempt', "loginAttempt")->name('attempt');
});

Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
    Route::get('index', "index")->name('index');
    Route::get('create', "create")->name('create');
    Route::post('store', "store")->name('store');
});

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');