<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome')->name('welcome');
    Route::view('register', 'auth.register')->name('register');
    Route::view('login', 'auth.login')->name('login');
    Route::get('/logout', fn () => redirect('/'));
});

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('services', 'service')->name('services');
    Route::view('companies', 'company')->name('companies');
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';
