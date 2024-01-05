<?php

namespace App\Livewire;

use App\Livewire\Forms\DetailForm;
use App\Models\Programmedetail;
use Livewire\Component;

class ProgrammeDetailEdit extends Component
{
    public DetailForm $detail;

    public $formation_id;

    function mount($programmedetail)
    {
        $this->detail->setDetail($programmedetail);    
    }

    function updated()
    {
        $this->detail->update();    
    }

    function destroy($formation_id)
    {
        $this->detail->delete();
        return redirect()->route('formations.edit', $formation_id);    }
 
    public function render()
    {
        return view('livewire.programme-detail-edit');
    }
}
