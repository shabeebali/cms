<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ViewSkilledWorkerForm extends Component
{
    public $afdata;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($afdata)
    {
        $this->afdata = $afdata;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.view-skilled-worker-form');
    }
}
