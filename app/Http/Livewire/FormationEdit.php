<?php

namespace App\Http\Livewire;

use App\Models\Duree;
use App\Models\Formation;
use App\Models\Programmeform;
use Livewire\Component;

class FormationEdit extends Component
{
    public Formation $formation;
    public $objectifpedago;
    public $programmeforms;
    public $duree;
    public $public;
    public $intervenant;
    public $modalites;
    public $pedagogie;
    public $documents;

    function mount()
    {
        $this->programmeforms = Programmeform::where('formation_id', $this->formation->id)->get();
        $this->duree = Duree::all();   
    }

    protected $rules = [
        'formation.name' => 'string|max:191|required',
        'formation.subname' => 'string|max:191',
        'formation.contexte' => 'text|max:65000',
    ];

    public function update()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.formation-edit');
    }
}
