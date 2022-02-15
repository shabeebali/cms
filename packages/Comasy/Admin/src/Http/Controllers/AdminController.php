<?php

namespace Comasy\Admin\Http\Controllers;

use Comasy\Admin\Http\Controllers\Controller;
use Comasy\Admin\Services\MenuPresenter;
use Nwidart\Menus\Facades\Menu;

class AdminController extends Controller
{
    public function __construct()
    {
    }
    public function dashboard()
    {
        return view('admin::dashboard');
    }
}
