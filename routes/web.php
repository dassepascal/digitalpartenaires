<?php

use Livewire\Volt\Volt;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Volt::route('/', 'index');

Route::middleware('guest')->group(function () {
	Volt::route('/register', 'auth.register');
});

Route::middleware('auth')->group(function () {
    Route::middleware(IsAdmin::class)
        ->prefix('admin')
        ->group(function () {
            Volt::route('/dashboard', 'admin.index')->name('admin');
        });
});

