<?php

namespace App\Livewire\Aromaliste;

use App\Models\Formation;
use App\Models\Phytoprep;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Features\SupportFormObjects\Form;

class FormationsPreparations extends Component
{
    public Collection $formations;
    public Collection $preparations;
    public Formation $formation;
    public $formationPreparations;
    public int $formationId = 2;

    public function mount()
    {
        $this->formations = Formation::all();
        $this->preparations = Phytoprep::all();
        $this->formation = Formation::find($this->formationId);
        $this->formationPreparations = $this->formation->preparations;
    }

    public function choisitFormation($formationId)
    {
        $this->formationId = $formationId;
        $this->formation = Formation::find($formationId);
        $this->formationPreparations = $this->formation->preparations;
    }

    public function enlevePreparation($preparationId)
    {
        $this->formation->preparations()->detach($preparationId);
        $this->formationPreparations = $this->formation->preparations;

    }

    public function ajoutePreparation($preparationId)
    {
        $this->formation->preparations()->attach($preparationId);
        $this->formationPreparations = $this->formation->preparations;

    }
    public function render()
    {
        return view('livewire.aromaliste.formations-preparations');
    }
}
