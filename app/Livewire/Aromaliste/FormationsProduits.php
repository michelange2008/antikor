<?php

namespace App\Livewire\Aromaliste;

use App\Models\Formation;
use App\Models\Phytoprep;
use App\Models\Phytotype;
use App\Traits\CalculQttProduits;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FormationsProduits extends Component
{
    use CalculQttProduits;

    public Collection $formations;
    public Formation $formation;
    public int $formationChoisie = 1;
    public Collection $listePreparations;
    public \Illuminate\Support\Collection $listeProduits;
    public Collection $preparationsChoisies;
    public Collection $toutesPreparations;
    public int $nombreStagiaires = 10;
    public bool $showProduits = false;

    public function mount()
    {
        $this->formations = Formation::all();
        $this->formation = Formation::find($this->formationChoisie);
        $this->toutesPreparations = Phytoprep::all();
        $this->listePreparations = $this->formation->preparations;
        $this->preparationsChoisies = $this->listePreparations;
        $this->listeProduits = $this->produitsAvecQuantite($this->preparationsChoisies, $this->nombreStagiaires)->groupBy('phytotype_id');
    }

    public function updated($name, $value)
    {
        $this->listeProduits = collect();
        if ($name == "formationChoisie") {
            // Toutes les préparations
            if ($value == 1000) {
                $this->listePreparations = $this->toutesPreparations;
                $this->preparationsChoisies = $this->toutesPreparations;
            // Préparations pour une formation dont l'id est existante
            } elseif ( in_array($value, $this->formations->pluck('id')->toArray()) ) {
                $this->formationChoisie = $value;
                $this->formation = Formation::find($value);
                $this->listePreparations = $this->formation->preparations;
                $this->preparationsChoisies = $this->formation->preparations;
            // Aucune préparation ou valeur aberrante
            } else {
                $this->listePreparations = $this->toutesPreparations;
                $this->preparationsChoisies = new Collection();
            }
            
            $this->listeProduits = $this->produitsAvecQuantite($this->preparationsChoisies, $this->nombreStagiaires)->groupBy('phytotype_id');
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
        $this->listeProduits = $this->produitsAvecQuantite($this->preparationsChoisies, $this->nombreStagiaires)->groupBy('phytotype_id');
    }


    public function render()
    {
        return view('livewire.aromaliste.formations-produits');
    }
}
