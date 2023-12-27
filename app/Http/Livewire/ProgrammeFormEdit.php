<?php

namespace App\Http\Livewire;

use App\Models\Programmeform;
use Livewire\Component;

class ProgrammeFormEdit extends Component
{
    public Programmeform $programmeform;

    protected $rules = [
        'programmeform.soustitre' => 'max:191|required',
        'programmeform.detail' => 'max:65000',
    ];

    function update()
    {
        $this->validate();    
        $this->programmeform->save();
    }
    public function render()
    {
        return view('livewire.programme-form-edit');
    }
}
