<?php

namespace App\Livewire;

use Livewire\Component;

class Joker extends Component
{
    public $code;
    public int $input;
    public $bonnevaleurs = [];
    public $resultat= [];
    public $choix = [];
    public bool $fin = false;

    public function mount($code)
    {
        $this->code = $code;    
        $this->bonnevaleurs['boninput'] = 4;
        $this->bonnevaleurs['bonnecouleur'] = "rouge";
        $this->resultat['calcul'] = false;
    }

    public function calculer()
    {
        // dd($this);
        $this->resultat['calcul'] = ($this->input == $this->bonnevaleurs['boninput']) ? true : false;
        $this->fin = true;
    }

    public function render()
    {
        return view('livewire.joker');
    }
}
