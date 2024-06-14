<?php

namespace App\Livewire;

use Livewire\Component;

class Dosages extends Component
{
    public $oligovitamines;
    public $dosages;
    public $element_choisi;
    public $substrat_choisi;


    function mount()
    {
        $this->oligovitamines = config("oligo.oligovitamines");
        $this->dosages = config('dosages');

        $this->element_choisi = "cuivre";
    }

    public function render()
    {
        return view('livewire.dosages');
    }
}
