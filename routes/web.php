<?php

use Livewire\Volt\Volt;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminOrRedac;

Volt::route('/', 'index')->name('index');
Volt::route('/blog', 'blog.index')->name('blog.index');
Volt::route('/blog/posts/{slug}', 'blog.posts.show')->name('posts.show');
Volt::route('/category/{slug}', 'blog.index');
//Volt::route('/blog/search/{param}', 'index')->name('posts.search');


Volt::route('/pages/{page:slug}', 'page')->name('pages');
Volt::route('/services/e-commerce', 'services.e-commerce')->name('services.e-commerce');
Volt::route('/services/site-vitrine', 'services.site-vitrine')->name('services.site-vitrine');

Volt::route('services/marketing-digital', 'services.marketing-digital')->name('services.marketing-digital');
Volt::route('portfolio', 'portfolio')->name('portfolio');


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

    Route::middleware(IsAdminOrRedac::class)->prefix('admin')->group(function () {

        Volt::route('/dashboard', 'admin.dashboard')->name('admin.dashboard');
        Volt::route('/posts/index', 'admin.posts.index')->name('posts.index');
        Volt::route('/posts/create', 'admin.posts.create')->name('posts.create');
        Volt::route('/posts/{post:slug}/edit', 'admin.posts.edit')->name('posts.edit');
        Volt::route('/categories', 'admin.blog.categories.index')->name('admin.blog.categories.index');
        Volt::route('/categories/create', 'admin.blog.categories.create')->name('admin.blog.categories.create');
        Volt::route('/categories/{category}/edit', 'admin.blog.categories.edit')->name('admin.blog.categories.edit');
    });
    Route::middleware(IsAdmin::class)->prefix('admin')->group(function () {
        // Dashboard principal pour choisir entre Shop et Blog
        Volt::route('/dashboard', 'admin.dashboard')->name('admin.dashboard');
        Route::prefix('agency')->group(function () {
            Volt::route('/dashboard', 'admin.agency.dashboard')->name('admin.agency.dashboard');
            Volt::route('/pages', 'admin.parameters.pages.index')->name('admin.parameters.pages.index');
            Volt::route('/pages/create', 'admin.parameters.pages.create')->name('admin.parameters.pages.create');
            Volt::route('/pages/{page}/edit', 'admin.parameters.pages.edit')->name('admin.parameters.pages.edit');


        });
        Route::prefix('blog')->group(function () {
            Volt::route('/dashboard', 'admin.blog.dashboard')->name('admin.blog.dashboard');
            Volt::route('/posts', 'admin.blog.posts.index')->name('admin.blog.posts.index');
            Volt::route('/posts/create', 'admin.blog.posts.create')->name('admin.blog.posts.create');
            Volt::route('/posts/{post:slug}/edit', 'admin.blog.posts.edit')->name('admin.blog.posts.edit');
            Volt::route('/categories', 'admin.blog.categories.index')->name('admin.blog.categories.index');
            Volt::route('/categories/create', 'admin.blog.categories.create')->name('admin.blog.categories.create');
            Volt::route('/categories/{category}/edit', 'admin.blog.categories.edit')->name('admin.blog.categories.edit');
            Volt::route('/pages/index', 'admin.blog.pages.index')->name('admin.blog.pages.index');
            Volt::route('/pages/create', 'admin.blog.pages.create')->name('admin.blog.pages.create');
            Volt::route('/pages/{page:slug}/edit', 'admin.blog.pages.edit')->name('admin.blog.pages.edit');
            Volt::route('/users/index', 'admin.blog.users.index')->name('admin.blog.users.index');
            Volt::route('/users/{user}/edit', 'admin.blog.users.edit')->name('admin.blog.users.edit');
            Volt::route('/comments/index', 'admin.blog.comments.index')->name('admin.blog.comments.index');
            Volt::route('/comments/{comment}/edit', 'admin.blog.comments.edit')->name('admin.blog.comments.edit');
            Volt::route('/menus/index', 'admin.blog.menus.index')->name('admin.blog.menus.index');
            Volt::route('/menus/create', 'admin.blog.menus.create')->name('admin.blog.menus.create');
            Volt::route('/menus/{menu}/edit', 'admin.blog.menus.edit')->name('admin.blog.menus.edit');
            Volt::route('/submenus/{submenu}/edit', 'admin.blog.menus.editsub')->name('admin.blog.submenus.edit');
            Volt::route('/images/index', 'admin.blog.images.index')->name('admin.blog.images.index');
            Volt::route('/images/{year}/{month}/{id}/edit', 'admin.blog.images.edit')->name('admin.blog.images.edit');
            Volt::route('/settings', 'admin.blog.settings')->name('admin.blog.settings');

        });
    });
});
