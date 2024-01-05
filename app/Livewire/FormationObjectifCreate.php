<?php

namespace App\Livewire;

use App\Models\Objectifpedago;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormationObjectifCreate extends Component
{
    public Objectifpedago $objectif;
    public $formation_id;

    #[Rule('required|max:191', message: "Ce champ ne pas être vide!")]
    public $nom = '';
    
    function create($formation_id)
    {
        $this->validate();
        $objectif = new Objectifpedago();
        $objectif->nom = $this->nom;
        $objectif->formation_id = $formation_id;
        $objectif->save();
        $this->update();
        $this->dispatch('objectif-change');
    }

    function update()
    {
        $this->nom = '';
    }

    public function render()
    {
        return view('livewire.formation-objectif-create');
    }
}
