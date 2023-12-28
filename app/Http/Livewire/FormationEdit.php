<?php

namespace App\Http\Livewire;

use App\Models\Duree;
use App\Models\Formation;
use App\Models\Programmedetail;
use App\Models\Programmesoustitre;
use Livewire\Component;

class FormationEdit extends Component
{
    public Formation $formation;
    public $objectifpedago;
    public $programmesoustitres;
    public $programmedetails;
    public $duree;
    public $public;
    public $intervenant;
    public $modalites;
    public $pedagogie;
    public $documents;

    function mount()
    {
        $this->programmesoustitres = Programmesoustitre::
            where('formation_id', $this->formation->id)->orderBy('ordre')->get();
        $this->programmedetails = Programmedetail::
            whereIn('programmesoustitre_id', $this->programmesoustitres->pluck('id'))->get();
        $this->duree = Duree::all();
    }

    protected $rules = [
        'formation.name' => 'string|max:191|required',
        'formation.subname' => 'string|max:191',
        'formation.contexte' => 'string|max:65000',
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
