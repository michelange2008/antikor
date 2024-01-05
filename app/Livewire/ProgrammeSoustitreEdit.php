<?php

namespace App\Livewire;

use App\Livewire\Forms\SoustitreForm;
use App\Models\Programmesoustitre;
use Livewire\Component;

class ProgrammeSoustitreEdit extends Component
{
    public SoustitreForm $soustitre;

    public $formation_id;

    function mount(Programmesoustitre $programmesoustitre)
    {
        $this->soustitre->setSoustitre($programmesoustitre);    
    }

    function updated($name, $value)
    {
        $this->soustitre->update($name, $value);   
    }

    function destroy($formation_id)
    {
        $this->soustitre->delete();
        return redirect()->route('formations.edit', $formation_id);
    }
    
    public function render()
    {
        return view('livewire.programme-soustitre-edit');
    }
    
}
