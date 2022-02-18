<?php

namespace App\View\Components;

use Comasy\Menu\Models\Menu;
use Comasy\Page\Models\CmsPage;
use Illuminate\View\Component;

class FrontendLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $menu = [];
        $data = Menu::where('slug', 'default')->first()->items;
        foreach ($data as $item) {
            if ($item->type == 'page') {
                $page = CmsPage::find($item->page_id);
                if ($page && $page->active) {
                    $menu[] = ['url' => '/' . $page->url_key, 'title' => $item->title];
                }
            }
            if ($item->type == 'manual') {
                $menu[] = ['url' => '/' . $item->url, 'title' => $item->title];
            }
        }
        return view('layouts.frontend', ['menu' => $menu]);
    }
}
