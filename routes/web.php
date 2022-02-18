<?php

use Comasy\Core\Models\Setting;
use Comasy\Menu\Models\Menu as CMSMenu;
use Comasy\Page\Models\CmsPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $homepage_id = Setting::where('slug', 'homepage_id')->first();
    if ($homepage_id) {
        $page = CmsPage::find($homepage_id->value);
        return view('home', ['content' => $page->html_content]);
    }
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';
Route::get('{any}', function ($any) {
    $page = CmsPage::where('url_key', $any)->first();
    if ($page) {
        return view('page', ['content' => $page->html_content]);
    }
    abort(404);
})->where('any', '.*');
