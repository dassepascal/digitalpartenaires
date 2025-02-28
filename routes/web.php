<?php

use Livewire\Volt\Volt;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Volt::route('/', 'index');

Route::middleware('guest')->group(function () {
    Volt::route('/register', 'auth.register');
    Volt::route('/login', 'auth.login')->name('login');
    Volt::route('/forgot-password', 'auth.forgot-password');
    Volt::route('/reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

Route::middleware('auth')->group(function () {

    Route::prefix('account')->group(function () {
        Volt::route('/profile', 'account.profile')->name('profile');
    });
    Route::middleware(IsAdmin::class)
        ->prefix('admin')
        ->group(function () {
            Volt::route('/dashboard', 'admin.index')->name('admin');
        });
});
