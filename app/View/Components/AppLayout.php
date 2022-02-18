<?php

namespace App\View\Components;

use Comasy\Core\Models\Setting;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $logo = Setting::where('slug', 'logo')->first();
        $logo_url = '';
        if ($logo->value) {
            $logo_url = $logo->value;
        }
        return view('layouts.app', ['logo_url' => $logo_url]);
    }
}
