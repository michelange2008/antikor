<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use App\Models\Phytotype;
use App\Traits\LitJson;
use Livewire\Component;

class PreparationsListe extends Component
{
    use LitJson;

    public $preparation;
    public $preparations;
    public $types; 
    public String $texte = 'liste_preps';
    public String $icone = 'preps_light.svg';
    public Bool $edit  = false ;
    public Bool $add_prep = false;

    protected $rules = [
        'preparation.name' => 'required|string|max:50',
        'preparation.officiel' => 'required|string|max:50',
        'preparation.detail' => 'max:65000',
        'preparation.fabrication' => 'max:65000',
        'preparation.icone' => 'max:50',
    ];

    protected $listeners = [
        'preparationUpdated' => 'onPreparationUpdated',
    ];

    public function mount()
    {
        $this->preparation = new Phytoprep();
        $this->preparations = Phytoprep::all();
        $this->types = Phytotype::all();
        $this->icone;
        $this->texte;
    }

    public function onPreparationUpdated()
    {
        $this->edit = false;
    }

    public function add_preparation()
    {
        $this->validate();
        $this->preparation->save();
        $this->add_prep = false;
    }

    public function render()
    {
        return view('livewire.preparations-liste');
    }
}
