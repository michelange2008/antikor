<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use App\Models\Phytoproduit;
use App\Models\Phytotype;
use Livewire\Component;
use Livewire\Request;

class CompositionEdit extends Component
{
    public Phytoprep $preparation;
    public $types;
    public $produits;
    public $quantites = [];
    public $quantite;

    protected $rules = [
        'quantite' => '',
    ];

    function mount()
    {
        $this->fill([
            'types' => Phytotype::all(),
            'produits' => Phytoproduit::all()->sortBy('name'),
        ]);
    }



    public function update()
    {
        $this->validate();
        dd($this->preparation->produits());
    }

    public function render()
    {
        return view('livewire.composition-edit');
    }
}
