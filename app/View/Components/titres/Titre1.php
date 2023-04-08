<?php

namespace App\View\Components\titres;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Titre1 extends Component
{
    public String $texte;
    public String $icone;
    public String $couleur;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.titres.titre1');
    }
}
