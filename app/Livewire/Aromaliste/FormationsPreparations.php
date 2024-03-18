<?php

namespace App\Livewire\Aromaliste;

use App\Models\Formation;
use App\Models\Phytoprep;
use App\Traits\CalculQttProduits;
use Livewire\Component;

class FormationsPreparations extends Component
{
    use CalculQttProduits;

    public $formations;
    public Formation $formation;
    public int $formationChoisie = 1;
    public $listePreparations;
    public $listeProduits;
    public $preparationsChoisies;
    public $nombreStagiaires = 10;
    public $showProduits = false;

    public function mount()
    {
        $this->formations = Formation::all();
        $this->formation = Formation::find($this->formationChoisie);
        $this->listePreparations = $this->formation->preparations;
        $this->preparationsChoisies = $this->listePreparations;
        $this->listeProduits = $this->produitsAvecQuantite($this->preparationsChoisies, $this->nombreStagiaires);

    }

    public function updated($name, $value)
    {
        $this->listeProduits = collect();
        if ($name == "formationChoisie") {
            $this->formationChoisie = $value;
            $this->formation = Formation::find($value);
            $this->listePreparations = $this->formation->preparations;
            $this->preparationsChoisies = $this->formation->preparations;
            $this->listeProduits = $this->produitsAvecQuantite($this->preparationsChoisies, $this->nombreStagiaires);
        }
    }

    function togglePrep($preparation_id)
    {
        $preparationPresente = false;
        foreach ($this->preparationsChoisies as $key => $preparation) {
            if ($preparation_id == $preparation->id) {
                $this->preparationsChoisies->pull($key);
                $preparationPresente = true;
            }
        }
        if (!$preparationPresente) {
            $this->preparationsChoisies->push(Phytoprep::find($preparation_id));
        }
        $this->listeProduits = $this->produitsAvecQuantite($this->preparationsChoisies, $this->nombreStagiaires);
    }


    public function render()
    {
        return view('livewire.aromaliste.formations-preparations');
    }
}
