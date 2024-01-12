<?php

namespace App\Livewire\Formations;

use App\Livewire\Formations\Forms\SoustitreForm;
use Livewire\Component;

class ProgrammeSoustitreCreate extends Component
{
    public SoustitreForm $soustitre;

    public $formation_id;
    
    function save($formation_id)
    {
        $this->soustitre->store($formation_id);
        $this->dispatch('soustitre-change');
    }

    public function render()
    {
        return view('livewire.formations.programme-soustitre-create');
    }
}
