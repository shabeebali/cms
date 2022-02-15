<?php

use Comasy\Page\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->name('admin.')->group(function () {
    Route::resource('pages', PageController::class);
});
