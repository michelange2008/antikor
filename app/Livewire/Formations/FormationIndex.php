<?php

namespace App\Livewire\Formations;

use App\Models\Formation;
use Livewire\Component;

class FormationIndex extends Component
{
    public $formations;

    function delete(Formation $formation)
    {
        Formation::destroy($formation->id);
        $this->formations = Formation::all();
    }
    
    function mount()
    {
        $this->formations = Formation::all();    
    }
    public function render()
    {
        return view('livewire.formations.formation-index');
    }
}
