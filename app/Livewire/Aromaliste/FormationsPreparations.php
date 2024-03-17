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
    public int $formationChoisie;
    public $listePreparations;
    public $listeProduits = [];
    public $preparationsChoisies;
    public $nombreStagiaires = 10;

    public function mount()
    {
        $this->formations = Formation::all();
        $this->listePreparations = Formation::find(1)->preparations;
        $this->preparationsChoisies = $this->listePreparations;;
        // $this->preparationsChoisies = collect();
    }

    public function updated($name, $value)
    {
        if ($name == "formationChoisie") {
            $this->listePreparations = Formation::find($value)->preparations;
            $this->preparationsChoisies = $this->listePreparations;
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
    }
    
    public function showProduits()
    {

        $this->listeProduits = $this->produitsAvecQuantite($this->preparationsChoisies);

    }

    public function render()
    {
        return view('livewire.aromaliste.formations-preparations');
    }
}
