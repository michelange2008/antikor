<?php

namespace App\Http\Livewire;

use App\Models\Programmesoustitre;
use Livewire\Component;

class ProgrammeSoustitreEdit extends Component
{
    public Programmesoustitre $programmesoustitre;

    protected $rules = [
        'programmesoustitre.nom' => 'required|string|max:191',
        'programmesoustitre.ordre' => 'required|numeric'
    ];

    function update() {
        $this->validate();
        $this->programmesoustitre->save();
    }
    public function render()
    {
        return view('livewire.programme-soustitre-edit');
    }
}
