<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('shop', [PageController::class, 'shop'])->name('shop');
Route::get('about-us', [PageController::class, 'about_us'])->name('about-us');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('login', [PageController::class, 'login_page'])->name('login-page');
Route::get('register', [PageController::class, 'register_page'])->name('register-page');

// User authentication
Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::post('login', [UserController::class, 'login'])->name('user.login');
Route::get('logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('product/{name}/{id}', [PageController::class, 'item_info'])->name('item-info');
Route::post('/add-to-cart/{id}', [PageController::class, 'store'])->name('add-to-cart');
Route::get('/shopping-cart', [PageController::class, 'shopping_cart'])->name('shopping-cart');

Route::post('product/{name}/{id}', [RatingsController::class, 'rate'])->name('rate.item');

// Admin Routes
Route::middleware(['IpWhiteList'])->group(function () {
    Route::get('admin', [AdminController::class, 'admin_login_page'])->name('admin.login-page');
    Route::get('admin/register', [AdminController::class, 'admin_register_page'])->name('admin.register-page');
    
    Route::post('admin/register', [AdminController::class, 'admin_register'])->name('admin.register');
    Route::post('admin/login', [AdminController::class, 'admin_login'])->name('admin.login');


    Route::middleware(['admin', 'IpWhiteList'])->group(function () {
        Route::get('admin/add-item', [AdminController::class, 'add_item'])->name('admin.add-item');
        Route::post('admin/add-item', [AdminController::class, 'add_item_to_cart'])->name('admin.add-item-to-cart');
        Route::get('admin/all-items', [AdminController::class, 'all_items'])->name('admin.all-items');

        Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });
});
