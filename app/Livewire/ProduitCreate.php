<?php

namespace App\Livewire;

use App\Models\Phytoproduit;
use App\Models\Phytotype;
use App\Models\Phytounite;
use Livewire\Component;

class ProduitCreate extends Component
{
    public Phytoproduit $produit;
    public $phytotypes;
    public $phytounites;

    public function mount()
    {
        $this->produit = new Phytoproduit();
        $this->phytotypes = Phytotype::all();
        $this->phytounites = Phytounite::all();
    }

    protected $rules = [
        'produit.name' => 'required|string|min:2|max:191',
        'produit.phytotype_id' => 'required|integer',
        'produit.phytounite_id' => 'required|integer',
    ];

    public function save()
    {
        $this->validate();
        $this->produit->save();
        
    }

    public function render()
    {
        return view('livewire.produit-create');
    }
}
