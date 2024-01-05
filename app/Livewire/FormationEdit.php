<?php

namespace App\Livewire;

use App\Models\Formation;
use App\Models\Objectifpedago;
use App\Models\Programmedetail;
use App\Models\Programmesoustitre;
use Livewire\Component;

class FormationEdit extends Component
{
    public Formation $formation;
    protected $programmesoustitres;
    protected $programmedetails;

    function mount()
    {
        $this->programmesoustitres = Programmesoustitre::where('formation_id', $this->formation->id)->orderBy('ordre')->get();
        $this->programmedetails = Programmedetail::whereIn('programmesoustitre_id', $this->programmesoustitres->pluck('id'))->get();
    }
    public function render()
    {
        return view('livewire.formation-edit', [
            'programmesoustitres' => $this->programmesoustitres,
            'programmedetails' => $this->programmedetails,
            'objectifs_pedago' => Objectifpedago::where('formation_id', $this->formation->id)->get(),

        ]);
    }
}
