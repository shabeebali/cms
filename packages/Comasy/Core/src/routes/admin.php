<?php

use Comasy\Core\Models\Setting;
use Comasy\Page\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('settings', function () {
        $pages = CmsPage::where('active', 1)->get();
        $settings = Setting::all();
        $data = [];
        foreach ($settings as $setting) {
            $data[$setting->slug] = $setting->value;
        }
        return view('core::admin.settings', ['pages' => $pages, 'data' => collect($data)]);
    })->name('settings.index');

    Route::post('settings/update', function (Request $request) {
        // dd($request->file('logo'));
        $settings = Setting::all();
        foreach ($settings as $setting) {
            if ($setting->slug == 'logo' && $request->logo) {
                $path = $request->file('logo')->storeAs('assets', 'logo', 'public');
                $setting->value = $path;
                $setting->save();
            } else {
                if ($request->{$setting->slug}) {
                    $setting->value = $request->{$setting->slug};
                    $setting->save();
                }
            }
        }
        return redirect(route('admin.settings.index'))->with('success', 'Settings Saved Successfully');
    })->name('settings.update');
});
