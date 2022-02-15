<?php

namespace Comasy\Admin\Services;

use Illuminate\Support\Facades\Request;
use \Nwidart\Menus\Presenters\Presenter;

class MenuPresenter extends Presenter
{
    /**
     * {@inheritdoc }
     */
    public function getOpenTagWrapper()
    {
        return  PHP_EOL . '<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getCloseTagWrapper()
    {
        return  PHP_EOL . '</div>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        $classes = '';
        if ($this->getActiveState($item)) {
            $classes = 'main-nav-item-active';
        } else {
            $classes = 'main-nav-item';
        }
        return '<a class="' . $classes . '" href="' . $item->getUrl() . '">' . $item->getIcon() . ' ' . $item->title . '</a>';
    }

    /**
     * {@inheritdoc }
     */
    public function getActiveState($item)
    {
        return Request::is($item->getRequest());
    }

    /**
     * {@inheritdoc }
     */
    public function getDividerWrapper()
    {
        return '<li class="divider"></li>';
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithDropDownWrapper($item)
    {
        return '<li class="has-dropdown">
		        <a href="#">
		         ' . $item->getIcon() . ' ' . $item->title . '
		        </a>
		        <ul class="dropdown">
		          ' . $this->getChildMenuItems($item) . '
		        </ul>
		      </li>' . PHP_EOL;;
    }
}
