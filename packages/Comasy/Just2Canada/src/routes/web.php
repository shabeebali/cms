<?php

use App\Models\User;
use Comasy\J2C\Http\Controllers\BusinessImmigrationController;
use Comasy\J2C\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('business-immigration-assessment', function () {
    $countries = Country::select('id', 'name')->get();
    return view('j2c::business-immigration-assessment', ['countries' => $countries]);
});
Route::post('business-immigration-form-submit', [BusinessImmigrationController::class, 'submit'])->name('business-immigration-form-submit');
Route::view('skilled-worker-thank', 'j2c::skilled-worker-thank')->name('skilled-worker-thank');
Route::post('check-account-exists', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if ($user) {
        return response()->json([
            'message' => 'exists'
        ]);
    }
    return response()->json([
        'message' => 'not-exists'
    ]);
})->name('check-account-exists');
