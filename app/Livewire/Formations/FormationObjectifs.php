<?php

namespace App\Livewire\Formations;

use App\Models\Objectifpedago;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormationObjectifs extends Component
{
    public Objectifpedago $objectif;

    #[Rule('required|max:191', message: "Ce champs doit être rempli")]
    public $nom = '';

    function mount() {
        $this->nom = $this->objectif->nom;
    }

    function updated() {

        $this->validate();
        $this->objectif->update($this->only('nom'));
    }

    function delete()
    {
        $this->objectif->delete();   
        $this->dispatch('objectif-change'); 
    }

    public function render()
    {
        return view('livewire.formations.formation-objectifs');
    }
}
