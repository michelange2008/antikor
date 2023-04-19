<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use App\Models\Phytotype;
use Livewire\Component;
use Livewire\WithFileUploads;

class PreparationsListe extends Component
{
    use WithFileUploads;

    public $preparation;
    public $icone;
    public $preparations;
    public $types; 
    public String $texte_titre = 'liste_preps';
    public String $icone_titre = 'preps_light.svg';
    public Bool $edit  = false ;
    public Bool $add_prep = false;

    protected $rules = [
        'preparation.name' => 'required|string|max:50',
        'preparation.officiel' => 'required|string|max:50',
        'preparation.detail' => 'max:65000',
        'preparation.fabrication' => 'max:65000',
        'icone' => 'max:50',
        // 'preparation.icone' => 'max:50',
    ];

    protected $listeners = [
        'preparationUpdated' => 'onPreparationUpdated',
        'preparationCreated' => 'mount',
    ];

    public function mount()
    {
        $this->preparation = new Phytoprep();

        $this->preparations = Phytoprep::all();
        $this->types = Phytotype::all();
        $this->icone_titre;
        $this->texte_titre;
    }

    public function onPreparationUpdated()
    {
        $this->edit = false;
    }

    public function add_preparation()
    {
        $this->validate();

        $this->icone->storeAs('img/icones', $this->preparation->name);
        $this->preparation->save();
        $this->add_prep = false;
        $this->emit('preparationCreated');

    }

    public function render()
    {
        return view('livewire.preparations-liste');
    }
}
