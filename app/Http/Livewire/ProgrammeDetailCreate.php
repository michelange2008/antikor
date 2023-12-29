<?php

namespace App\Http\Livewire;

use App\Models\Programmedetail;
use App\Models\Programmesoustitre;
use Livewire\Component;

class ProgrammeDetailCreate extends Component
{
    public Programmesoustitre $programmesoustitre;
    public $programmedetail;

    protected $rules = [
        'programmedetail.nom' => 'string|max:65000',
    ];

    function mount()
    {
        $this->programmedetail = new Programmedetail();
    }

    function create()
    {
        $this->validate();
        $this->programmedetail->programmesoustitre_id = $this->programmesoustitre->id;
        $this->programmedetail->save();    
    }

    public function render()
    {
        return view('livewire.programme-detail-create');
    }
}
