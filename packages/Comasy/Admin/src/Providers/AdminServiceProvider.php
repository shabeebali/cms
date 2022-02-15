<?php

namespace Comasy\Admin\Providers;

use Comasy\Admin\Services\MenuPresenter;
use Illuminate\Support\ServiceProvider;
use Nwidart\Menus\Facades\Menu;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        Menu::create('admin-menu', function ($menu) {
            $menu->route(
                'admin.dashboard',
                'Dashboard'
            );
            $menu->setPresenter(MenuPresenter::class);
        });
    }
}
