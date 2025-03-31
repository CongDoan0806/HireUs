<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register-post');

Route::get('/verify', [UserController::class, 'showVerificationForm'])->name('verify.form');
Route::post('/verify', [UserController::class, 'verifyCode'])->name('verify.code');

Route::get('/login', [UserController::class, 'login'])->name('login');
// Xử lý đăng nhập
Route::post('/login', [UserController::class, 'authenticate'])->name('login.submit');

Route::get('/', [PageController::class, 'viewhomepage']);


