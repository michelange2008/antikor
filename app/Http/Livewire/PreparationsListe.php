<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use Livewire\Component;

class PreparationsListe extends Component
{

    public $liste;



    public function render()
    {
        return view('livewire.preparations-liste');
    }
}
