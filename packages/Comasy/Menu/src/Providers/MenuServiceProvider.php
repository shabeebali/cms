<?php

namespace Comasy\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Nwidart\Menus\Facades\Menu;

class MenuServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'menu');

        Menu::modify('admin-menu', function ($menu) {
            $menu->add(['title' => 'Menu', 'url' => '/admin/menus'])->hideWhen(function () {
                return false;
            });
        });
    }
}
