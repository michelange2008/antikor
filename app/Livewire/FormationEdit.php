<?php

namespace App\Livewire;

use App\Models\Formation;
use App\Models\Objectifpedago;
use App\Models\Programmedetail;
use App\Models\Programmesoustitre;
use Livewire\Attributes\On;
use Livewire\Component;

class FormationEdit extends Component
{
    public Formation $formation;
    protected $programmesoustitres;
    protected $programmedetails;
    protected $objectifs_pedago;
    public $programmesoustitre;

    function mount()
    {
        $this->programmesoustitres = Programmesoustitre::where('formation_id', $this->formation->id)->orderBy('ordre')->get();
        $this->programmedetails = Programmedetail::whereIn('programmesoustitre_id', $this->programmesoustitres->pluck('id'))->get();
        $this->objectifs_pedago = Objectifpedago::where('formation_id', $this->formation->id)->get();
    }

    #[On('objectif-change')] 
    #[On('soustitre-change')]
    #[On('detail-change')]
    function update()
    {
        $this->programmesoustitres = Programmesoustitre::where('formation_id', $this->formation->id)->orderBy('ordre')->get();
        $this->programmedetails = Programmedetail::whereIn('programmesoustitre_id', $this->programmesoustitres->pluck('id'))->get();
        $this->objectifs_pedago = Objectifpedago::where('formation_id', $this->formation->id)->get();
    }



    public function render()
    {
        return view('livewire.formation-edit', [
            'programmesoustitres' => $this->programmesoustitres,
            'programmedetails' => $this->programmedetails,
            'objectifs_pedago' => $this->objectifs_pedago,

        ]);
    }
}
