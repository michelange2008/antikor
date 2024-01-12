<?php

namespace App\Livewire\Formations;

use App\Livewire\Formations\Forms\DetailForm;
use Livewire\Component;

class ProgrammeDetailEdit extends Component
{
    public DetailForm $detail;

    public $formation_id;
    public $id_item;

    function mount($programmedetail)
    {
        $this->detail->setDetail($programmedetail);    
    }

    function updated()
    {
        $this->detail->update();    
    }

    function destroy()
    {
        $this->detail->delete();
        $this->dispatch('detail-change');
    }

    public function render()
    {
        return view('livewire.formations.programme-detail-edit');
    }
}
