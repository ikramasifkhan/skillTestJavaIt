<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BredCrumbComponet extends Component
{
    public $title;
    public $links;

    public function __construct($title, $links)
    {
        $this->title = $title;
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bred-crumb-componet');
    }
}
