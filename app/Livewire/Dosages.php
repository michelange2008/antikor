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

        $this->element_choisi = "iode";
        $this->substrat_choisi = "iode total - sang";
    }

    function choisi_element($element)
    {
        $this->element_choisi = $element;
        if (count($this->dosages['substrats'][$this->element_choisi]) == 1) {
            $this->substrat_choisi = $this->dosages['substrats'][$this->element_choisi][0];
        }    
    }

    function reset_element()
    {
        $this->element_choisi = null;  
        $this->substrat_choisi = null;  
    }

    function choisi_substrat($substrat)
    {
        $this->substrat_choisi = $substrat;
    }

    function reset_substrat()
    {
        $this->substrat_choisi = null;    
    }

    public function render()
    {
        return view('livewire.dosages');
    }
}
