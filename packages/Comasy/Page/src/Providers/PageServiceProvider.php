<?php

namespace Comasy\Page\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Nwidart\Menus\Facades\Menu;

class PageServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'page');

        Menu::modify('admin-menu', function ($menu) {
            $menu->add(['title' => 'Pages', 'url' => '/admin/pages'])->hideWhen(function () {
                return false;
            });
        });
    }
}
