<?php

namespace App\Http\Livewire;

use App\Models\Formation;
use Livewire\Component;

class FormationDetail extends Component
{
    public Formation $formation;

    public function render()
    {
        return view('livewire.formation-detail',[
            'formation' => $this->formation,
        ]);
    }
}
