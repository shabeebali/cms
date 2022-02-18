<?php

namespace Comasy\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Nwidart\Menus\Facades\Menu;

class CoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'core');

        Menu::modify('admin-menu', function ($menu) {
            $menu->add(['title' => 'Settings', 'url' => '/admin/settings'])->hideWhen(function () {
                return false;
            });
        });
    }
}
