<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use App\Models\Phytotype;
use App\Traits\LitJson;
use Livewire\Component;

class PreparationsListe extends Component
{
    use LitJson;

    public $preparations;
    public $texte = 'liste_preps';
    public $icone = 'preps.svg';
    public $types; 

    public function mount()
    {
        $this->preparations = Phytoprep::all();
        $this->icone;
        $this->texte;
        $this->types = Phytotype::all();
    }

    public function render()
    {
        return view('livewire.preparations-liste');
    }
}
