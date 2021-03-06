<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $iconName;
    public $info;
    public $url;

    public function __construct($iconType, $desc, $routeName)
    {
        $this->iconName = $iconType;
        $this->info = $desc;
        $this->url = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
