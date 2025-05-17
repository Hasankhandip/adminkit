<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Frontend\AboutController;
use App\Http\Controllers\Admin\Frontend\BannerController;
use App\Http\Controllers\Admin\Frontend\ServiceController;
use App\Http\Controllers\Admin\Frontend\ServiceItemController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

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

Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('index', "index")->name('index');
    Route::get('create', "create")->name('create');
    Route::post('store', "store")->name('store');
    Route::get('edit/{id}', "edit")->name('edit');
    Route::post('update/{id}', "update")->name('update');
    Route::get("delete/image/{id}/{productId}", "deleteImage")->name('delete.image');
});

Route::prefix('frontend')->name('frontend.')->group(function () {
    Route::controller(BannerController::class)->prefix('banner')->name('banner.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::post('store', "store")->name('store');
    });

    Route::controller(AboutController::class)->prefix('about')->name('about.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::post('store', "store")->name('store');

    });

    Route::controller(ServiceController::class)->prefix('service')->name('service.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::post('store', "store")->name('store');

    });

    Route::controller(ServiceItemController::class)->prefix('service/item')->name('service.item.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::get('create', "create")->name('create');
        Route::post('store', "store")->name('store');
        Route::get('edit/{id}', "edit")->name('edit');
        Route::post('update/{id}', "update")->name('update');
        Route::get('delete/{id}', "delete")->name('delete');
    });
});
