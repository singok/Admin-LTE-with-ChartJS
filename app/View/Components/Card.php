<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $boxType;
    public $iconType;
    public $message;
    public $count;
    public function __construct($bType, $iType, $detail, $count)
    {
        $this->boxType = $bType;
        $this->iconType = $iType;
        $this->message = $detail;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
