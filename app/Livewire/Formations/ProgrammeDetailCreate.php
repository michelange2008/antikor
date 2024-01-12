<?php

namespace App\Livewire\Formations;

use App\Livewire\Formations\Forms\DetailForm;
use Livewire\Component;

class ProgrammeDetailCreate extends Component
{
    public DetailForm $detail;

    public $programmesoustitre_id = '';
    public $formation_id = '';

    function save($programmesoustitre_id)
    {
        $this->detail->store($programmesoustitre_id);    
        $this->dispatch('detail-change');
    }

    public function render()
    {
        return view('livewire.formations.programme-detail-create');
    }
}
