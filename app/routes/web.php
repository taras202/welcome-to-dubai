<?php

use App\Http\Controllers\AdminRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/register', function () {
    return view('welcome');
});

Route::controller(AdminRegisterController::class)->group(function() {
    Route::get('/admin/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/admin/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
// /register -> new adminRegisterController->register();