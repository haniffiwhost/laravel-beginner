<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    // /**
    //  * Create a new component instance.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    // /**
    //  * Get the view / contents that represent the component.
    //  */
    // public function render(): View|Closure|string
    // {
    //     return view('components.alert');
    // }

    public $type;

    public function __construct($type = 'danger') // Default type is 'info' hat lain : success info
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('components.alert');
    }
}
