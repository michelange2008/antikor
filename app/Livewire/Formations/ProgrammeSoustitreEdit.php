<?php

namespace App\Livewire\Formations;

use App\Livewire\Formations\Forms\SoustitreForm;
use App\Models\Programmesoustitre;
use Livewire\Component;

class ProgrammeSoustitreEdit extends Component
{
    public SoustitreForm $soustitre;

    public $formation_id;
    public $id_item;

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
        return view('livewire.formations.programme-soustitre-edit');
    }
    
}
