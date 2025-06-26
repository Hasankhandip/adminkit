<?php
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\User\Auth\LoginController;
use App\Http\Controllers\Frontend\User\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->prefix('register')->name('register.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
});

Route::controller(LoginController::class)->prefix('login')->name('login.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/login/attempt', 'loginAttempt')->name('attempt');
});

Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('/list/{categid?}', 'index')->name('index');
    Route::get('/details/{id}', 'details')->name('details');
    Route::get('/category/{categoryId?}', 'categoryProducts')->name('category.product');
    Route::get('/brand/{brandId?}', 'brandProducts')->name('brand.product');
});

Route::controller(BlogController::class)->prefix('blog')->name('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/details', 'details')->name('details');
});

Route::controller(FaqController::class)->prefix('faq')->name('faq.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(CartController::class)->name('cart.')->prefix('cart')->group(function () {
    Route::get('index', 'index')->name('index');
    Route::get('add/{id}', 'cartAdd')->name('add');
});
Route::get('/', [HomeController::class, 'index'])->name('index');