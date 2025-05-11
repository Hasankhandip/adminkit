<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->prefix('login')->name('login.')->group(function () {
    Route::get('/', "login")->name('view');
    Route::post('login/attempt', "loginAttempt")->name('attempt');
});

Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
    Route::get('index', "index")->name('index');
    Route::get('create', "create")->name('create');
    Route::post('store', "store")->name('store');
    Route::get('edit/{id}', "edit")->name('edit');
    Route::post('update/{id}', "update")->name('update');
});

Route::controller(BrandController::class)->prefix('brand')->name('brand.')->group(function () {
    Route::get('index', "index")->name('index');
    Route::get('create', "create")->name('create');
    Route::post('store', "store")->name('store');
    Route::get('edit/{id}', "edit")->name('edit');
    Route::post('update/{id}', "update")->name('update');

});

Route::controller(ServiceController::class)->prefix('service')->name('service.')->group(function () {
    Route::get('index', "index")->name('index');
    Route::get('create', "create")->name('create');
    Route::post('store', "store")->name('store');
    Route::get('edit/{id}', "edit")->name('edit');
    Route::post('update/{id}', "update")->name('update');
});

Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('index', "index")->name('index');
    Route::get('create', "create")->name('create');
    Route::post('store', "store")->name('store');
    Route::get('edit/{id}', "edit")->name('edit');
    Route::post('update/{id}', "update")->name('update');
});

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');