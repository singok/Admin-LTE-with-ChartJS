<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserPic extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $url;
    public $username;
    public function __construct($path, $user)
    {
        $this->username = $user;
        $this->url = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-pic');
    }
}
