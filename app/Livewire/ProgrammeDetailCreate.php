<?php

namespace App\Livewire;

use App\Livewire\Forms\DetailForm;
use App\Models\Programmedetail;
use App\Models\Programmesoustitre;
use Livewire\Component;

class ProgrammeDetailCreate extends Component
{
    public DetailForm $detail;

    public $programmesoustitre_id = '';
    public $formation_id = '';

    function save($programmesoustitre_id)
    {
        $this->detail->store($programmesoustitre_id);    
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.programme-detail-create');
    }
}
