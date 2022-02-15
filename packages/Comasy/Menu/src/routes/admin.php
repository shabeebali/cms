<?php

use Comasy\Menu\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->name('admin.')->group(function () {
    Route::resource('menus', MenuController::class);
});
