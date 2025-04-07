<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\JobController;

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register-post');

Route::get('/verify', [UserController::class, 'showVerificationForm'])->name('verify.form');
Route::post('/verify', [UserController::class, 'verifyCode'])->name('verify.code');

Route::get('/login', [UserController::class, 'login'])->name('login');
// Xử lý đăng nhập
Route::post('/login', [UserController::class, 'authenticate'])->name('login.submit');

Route::get('/', [PageController::class, 'viewhomepage']);

// xử lý đăng nhập bằng google

Route::get('/auth/google', [UserController::class, 'loginGoogle'])->name('google.login');

Route::get('/auth/google/callback', [UserController::class, 'handleGoogle']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::post('/resend-verification-code', [UserController::class, 'resendVerificationCode'])->name('resend.verification.code');

Route::get('/company', [PageController::class, 'viewcompany']);

Route::get('/company/{id}', [PageController::class, 'viewCompany']);

Route::get('/detail/{id}', [JobController::class, 'getJobDetail']);


