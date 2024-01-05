<?php

namespace App\Livewire;

use App\Livewire\Forms\SoustitreForm;
use App\Models\Programmesoustitre;
use Livewire\Attributes\On;
use Livewire\Component;

class ProgrammeSoustitreEdit extends Component
{
    public SoustitreForm $soustitre;

    public $formation_id;

    function mount(Programmesoustitre $programmesoustitre)
    {
        $this->soustitre->setSoustitre($programmesoustitre);    
    }

    function updated()
    {
        $this->soustitre->update();   
    }

    function destroy()
    {
        $this->soustitre->delete();
        $this->dispatch('soustitre-change');
    }

    function update()
    {
    }
    
    public function render()
    {
        return view('livewire.programme-soustitre-edit');
    }
    
}
