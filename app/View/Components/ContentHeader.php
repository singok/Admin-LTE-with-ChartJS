<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContentHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $header;
    public $title;
    public $url;

    public function __construct($heading, $title, $routeName)
    {
        $this->header = $heading;
        $this->title = $title;
        $this->url = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content-header');
    }
}
