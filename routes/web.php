<?php

use Livewire\Volt\Volt;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Volt::route('/', 'index');
Volt::route('/services/e-commerce','services.e-commerce')->name('services.e-commerce');
Volt::route('/services/site-vitrine','services.site-vitrine')->name('services.site-vitrine');
Volt::route('services/blog','services.blog')->name('services.blog');
Volt::route('services/marketing-digital','services.marketing-digital')->name('services.marketing-digital');
Volt::route('portfolio','portfolio')->name('portfolio');

// route contact
Volt::route('/contact', 'contact')->name('contact');

Route::middleware('guest')->group(function () {
    Volt::route('/register', 'auth.register');
    Volt::route('/login', 'auth.login')->name('login');
    Volt::route('/forgot-password', 'auth.forgot-password');
    Volt::route('/reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

Route::middleware('auth')->group(function () {

    Route::prefix('account')->group(function () {
        Volt::route('/profile', 'account.profile')->name('profile');
        Volt::route('/addresses', 'account.addresses.index')->name('addresses');
		Volt::route('/addresses/create', 'account.addresses.create')->name('addresses.create');
		Volt::route('/addresses/{address}/edit', 'account.addresses.edit')->name('addresses.edit');
    });
    Route::middleware(IsAdmin::class)
        ->prefix('admin')
        ->group(function () {
            Volt::route('/dashboard', 'admin.index')->name('admin');
        });
});
