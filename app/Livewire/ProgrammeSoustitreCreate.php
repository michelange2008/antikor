<?php

namespace App\Livewire;

use App\Livewire\Forms\SoustitreForm;
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
        return view('livewire.programme-soustitre-create');
    }
}
