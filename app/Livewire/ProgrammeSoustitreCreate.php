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
        return redirect()->route('formations.edit', $formation_id)->with('message', 'Un nouveau sous-titre a été créé');
    }

    public function render()
    {
        return view('livewire.programme-soustitre-create');
    }
}
