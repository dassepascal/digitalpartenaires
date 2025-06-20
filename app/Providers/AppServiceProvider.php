<?php

namespace App\Providers;

use App\Models\Menu;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\{Blade,View};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

         if (!$this->app->runningInConsole()) {
        $settings = Setting::all();
        foreach ($settings as $setting) {
            config(['app.' . $setting->key => $setting->value]);
        }
    }
        View::composer(['components.layouts.app' ], function ($view) {
            $view->with(
                'menus',
                Menu::with(['submenus' => function ($query) {
                    $query->orderBy('order');
                }])->orderBy('order')->get()
            );
        });
    }
}
