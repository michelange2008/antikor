<?php

namespace App\Http\Livewire;

use App\Models\Phytotype;
use App\Models\Phytounite;
use Livewire\Component;

class ProduitCreate extends Component
{

    public function render()
    {
        return view('livewire.produit-create', [
            'phytotypes' => Phytotype::all(),
            'phytounites' => Phytounite::all(),
        ]);
    }
}
