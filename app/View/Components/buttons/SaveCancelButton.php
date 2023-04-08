<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SaveCancelButton extends Component
{
    public $cancel;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.buttons.save-cancel-button');
    }
}
