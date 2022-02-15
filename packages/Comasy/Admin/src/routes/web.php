<?php

use Comasy\Admin\Http\Controllers\AdminController;
use Comasy\Admin\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::prefix('admin')->controller(AuthController::class)->middleware(['web', 'guest:admin'])->name('admin.')->group(function () {
    Route::view('login', 'admin::auth.login');
    Route::post('login', 'login')->name('login');
});
Route::prefix('admin')->name('admin.')->middleware(['web', 'auth:admin'])->group(function () {
    Route::redirect('', 'dashboard');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('img-upload', function (Request $request) {
        $path = $request->file('file')->store('images', 'public');
        return [
            'url' => Storage::url($path),
            'message' => 'success'
        ];
    })->name('image.upload');
});
