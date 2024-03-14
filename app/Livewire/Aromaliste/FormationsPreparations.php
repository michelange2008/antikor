<?php

namespace App\Livewire\Aromaliste;

use App\Models\Formation;
use Livewire\Component;

class FormationsPreparations extends Component
{
    public $formations;

    public function mount()
    {
        $this->formations = Formation::all();
    }

    public function render()
    {
        return view('livewire.aromaliste.formations-preparations');
    }
}
