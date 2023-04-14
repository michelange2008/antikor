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
    public $types; 
    public String $texte = 'liste_preps';
    public String $icone = 'preps_light.svg';
    public Bool $edit  = false ;

    protected $listeners = [
        'preparationUpdated' => 'onPreparationUpdated',
    ];

    public function mount()
    {
        $this->preparations = Phytoprep::all();
        $this->types = Phytotype::all();
        $this->icone;
        $this->texte;
    }

    public function onPreparationUpdated()
    {
        $this->edit = false;
    }

    public function render()
    {
        return view('livewire.preparations-liste');
    }
}
