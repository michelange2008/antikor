<?php

namespace App\Livewire\Aromaliste;

use App\Models\Phytoprep;
use App\Models\Phytoproduit;
use App\Models\Phytotype;
use Livewire\Attributes\On;
use Livewire\Component;

class Composition extends Component
{
    public array $liste_produits = [];
    public $preparation;
    public $produits;
    public $types;



    public function mount($preparation_id)
    {
        $this->preparation = Phytoprep::find($preparation_id);
        $this->produits = Phytoproduit::all()->sortBy('name');
        $this->types = Phytotype::all();
        $this->majListeProduits();
    }

    public function majListeProduits()
    {
        foreach ($this->produits as $produit) {
            $this->liste_produits[$produit->id] = 0;
        }
        foreach ($this->preparation->produits as $produit) {
            $this->liste_produits[$produit->id] = $produit->pivot->quantite;
        } 
    }

    #[On('composition_edited')]
    public function startEdit($preparation_id)
    {
        $this->preparation = Phytoprep::find($preparation_id);    
    }

    public function closeEdit()
    {
        // if (empty($operation['attached']) && empty($operation['detached']) && empty($operation['updated'])) {

        //     $message = "La préparation n'a pas été modifiée";
        //     $typeMessage = "success";

        // } else {

        //     $message = "La composition de la préparation a été mise à jour";
        //     $typeMessage = "warning";
        // }
        
        $this->dispatch('composition_closeEdit', preparation_id: $this->preparation->id);

    }

    public function updated($name, $value)
    {
        if ($value == 0) {
            $operation = $this->preparation->produits()->detach([explode('.', $name)[1]]);
        } else {
            $operation = $this->preparation->produits()->detach([explode('.', $name)[1]]);
            $operation = $this->preparation->produits()->attach([explode('.', $name)[1] =>['quantite' => $value]]);
        }
        
        $this->dispatch('composition_updated', preparation_id: $this->preparation->id);
    }

    public function render()
    {
        return view('livewire.aromaliste.composition');
    }
}
