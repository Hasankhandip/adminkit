<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\Frontend\AboutController;
use App\Http\Controllers\Admin\Frontend\BannerController;
use App\Http\Controllers\Admin\Frontend\BlogController;
use App\Http\Controllers\Admin\Frontend\FooterController;
use App\Http\Controllers\Admin\Frontend\ProductController;
use App\Http\Controllers\Admin\Frontend\ServiceController;
use App\Http\Controllers\Admin\Frontend\WorkController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('has.not.admin')->controller(LoginController::class)->prefix('login')->name('login.')->group(function () {
    Route::get('/', "login")->name('view');
    Route::post('login/attempt', "loginAttempt")->name('attempt');
});

Route::middleware('has.admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('frontend')->name('frontend.')->group(function () {
        Route::controller(AdminLoginController::class)->prefix('login')->name('login.')->group(function () {
            Route::get('/', "index")->name('index');
            Route::post('store', "store")->name('store');
        });
        Route::controller(RegisterController::class)->prefix('register')->name('register.')->group(function () {
            Route::get('/', "index")->name('index');
            Route::post('store', "store")->name('store');
        });

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

        Route::controller(ServiceController::class)->prefix('service/item')->name('service.item.')->group(function () {
            Route::get('/', "itemIndex")->name('index');
            Route::get('create', "itemCreate")->name('create');
            Route::post('store', "itemStore")->name('store');
            Route::get('edit/{id}', "itemEdit")->name('edit');
            Route::post('update/{id}', "itemUpdate")->name('update');
            Route::get('delete/{id}', "itemDelete")->name('delete');
        });

        Route::controller(WorkController::class)->prefix('work')->name('work.')->group(function () {
            Route::get('/', "index")->name('index');
            Route::post('store', "store")->name('store');

        });

        Route::controller(WorkController::class)->prefix('work/item')->name('work.item.')->group(function () {
            Route::get('/', "itemIndex")->name('index');
            Route::get('create', "itemCreate")->name('create');
            Route::post('store', "itemStore")->name('store');
            Route::get('edit/{id}', "itemEdit")->name('edit');
            Route::post('update/{id}', "itemUpdate")->name('update');
            Route::get('delete/{id}', "itemDelete")->name('delete');
        });

        Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
            Route::get('/', "index")->name('index');
            Route::post('store', "store")->name('store');
        });

        Route::controller(BlogController::class)->prefix('blog')->name('blog.')->group(function () {
            Route::get('/', "index")->name('index');
            Route::post('store', "store")->name('store');
        });

        Route::controller(BlogController::class)->prefix('blog/item')->name('blog.item.')->group(function () {
            Route::get('/', "itemIndex")->name('index');
            Route::get('create', "itemCreate")->name('create');
            Route::post('store', "itemStore")->name('store');
            Route::get('edit/{id}', "itemEdit")->name('edit');
            Route::post('update/{id}', "itemUpdate")->name('update');
            Route::get('delete/{id}', "itemDelete")->name('delete');
        });

        Route::controller(FooterController::class)->prefix('footer')->name('footer.')->group(function () {
            Route::get('/', "index")->name('index');
            Route::post('store', "store")->name('store');
        });

        Route::controller(FooterController::class)->prefix('footer/contact')->name('footer.contact.')->group(function () {
            Route::get('/', "contactIndex")->name('index');
            Route::post('store', "contactStore")->name('store');
        });

        Route::controller(FooterController::class)->prefix('footer/social')->name('footer.social.')->group(function () {
            Route::get('/', "socialIndex")->name('index');
            Route::post('store', "socialStore")->name('store');
        });
    });

    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::get('create', "create")->name('create');
        Route::post('store', "store")->name('store');
        Route::get('edit/{id}', "edit")->name('edit');
        Route::post('update/{id}', "update")->name('update');
        Route::get('delete/{id}', "delete")->name('delete');
    });

    Route::controller(BrandController::class)->prefix('brand')->name('brand.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::get('create', "create")->name('create');
        Route::post('store', "store")->name('store');
        Route::get('edit/{id}', "edit")->name('edit');
        Route::post('update/{id}', "update")->name('update');
        Route::get('delete/{id}', "delete")->name('delete');

    });

    Route::controller(AdminProductController::class)->prefix('product')->name('product.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::get('create', "create")->name('create');
        Route::post('store', "store")->name('store');
        Route::get('edit/{id}', "edit")->name('edit');
        Route::post('update/{id}', "update")->name('update');
        Route::get("delete/image/{id}/{productId}", "deleteImage")->name('delete.image');
        Route::get('delete/{id}', "delete")->name('delete');
    });

    Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::post('store', "store")->name('store');
    });

    Route::controller(ContactController::class)->prefix('contact/item')->name('contact.item.')->group(function () {
        Route::get('/', "itemIndex")->name('index');
        Route::post('store', "itemStore")->name('store');
    });

    Route::controller(FaqController::class)->prefix('faq')->name('faq.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::post('store', "store")->name('store');
    });

    Route::controller(FaqController::class)->prefix('faq/item')->name('faq.item.')->group(function () {
        Route::get('/', "itemIndex")->name('index');
        Route::get('create', "itemCreate")->name('create');
        Route::post('store', "itemStore")->name('store');
        Route::get('edit/{id}', "itemEdit")->name('edit');
        Route::post('update/{id}', "itemUpdate")->name('update');
        Route::get('delete/{id}', "itemDelete")->name('delete');
    });

    Route::controller(GeneralSettingController::class)->prefix('general-setting')->name('general.setting.')->group(function () {
        Route::get('/', "index")->name('index');
        Route::post('/store', "store")->name('store');
    });
});
