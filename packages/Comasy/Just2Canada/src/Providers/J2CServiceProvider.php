<?php

namespace Comasy\J2C\Providers;

use Illuminate\Support\ServiceProvider;

use Nwidart\Menus\Facades\Menu;

class J2CServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'j2c');

        Menu::modify('admin-menu', function ($menu) {
            $menu->add(['title' => 'Application Forms', 'url' => '/admin/just2canada'])->hideWhen(function () {
                return false;
            });
        });
    }
}
