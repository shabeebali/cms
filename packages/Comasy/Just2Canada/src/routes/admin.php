<?php

use Comasy\J2C\Models\ApplicationForm;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('just2canada', function () {
        $rows = ApplicationForm::paginate(20);
        return view('j2c::admin.index', ['rows' => $rows]);
    })->name('just2canada');
    Route::get('view-application/{id}', function ($id) {
        $form = ApplicationForm::find($id);
        return view('j2c::admin.view-application', ['data' => $form]);
    })->name('view-application');
});
