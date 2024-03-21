<?php

namespace App\Livewire;

use Livewire\Component;

class Joker extends Component
{
    public $code;
    public int $input;
    public $resultat = false;

    public function mount($code)
    {
        $this->code = $code;    
    }

    public function calculer()
    {
        if($this->input == 4) {
            $this->resultat = true;
        }
    }

    public function render()
    {
        return view('livewire.joker');
    }
}
