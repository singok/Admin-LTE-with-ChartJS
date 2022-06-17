<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Logo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $url;
    public $name;
    public function __construct($path, $desc)
    {
        $this->url = $path;
        $this->name = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo');
    }
}
