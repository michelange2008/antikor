<?php

namespace App\Http\Livewire;

use App\Models\Programmedetail;
use Livewire\Component;

class ProgrammeDetailEdit extends Component
{
    public Programmedetail $programmedetail;

    protected $rules = [
        'programmedetail.nom' => 'string|max:65000',
    ];

    function update()
    {
        $this->validate();
        $this->programmedetail->save();    
    }

    public function render()
    {
        return view('livewire.programme-detail-edit');
    }
}
