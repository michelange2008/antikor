<?php

namespace App\Http\Livewire;

use App\Models\Programmedetail;
use Livewire\Component;

class ProgrammeDetailEdit extends Component
{
    public Programmedetail $programmedetail;

    protected $rules = [
        'programmedetail.nom' => 'string|mas:65000',
    ];

    public function render()
    {
        return view('livewire.programme-detail-edit');
    }
}
