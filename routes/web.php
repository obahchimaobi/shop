<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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