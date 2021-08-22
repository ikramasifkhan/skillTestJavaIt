<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionComponent extends Component
{
    public $status;
    public $actions;
    public function __construct($actions, $status)
    {
        $this->actions = $actions;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action-component');
    }
}
