<?php

namespace App\Livewire\Formations;

use App\Models\Formation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FormationShow extends Component
{
    public Formation $formation;
    public $nextFormation;
    public $previousFormation;
    public $programme;

    function mount()
    {
        $idFormation = $this->formation->id;
        $this->nextFormation = Formation::find($idFormation + 1);
        $this->previousFormation = Formation::find($idFormation - 1);
        $this->programme = DB::table('programmesoustitres')
            ->where('formations.id', $idFormation)
            ->join('formations', 'formations.id', 'programmesoustitres.formation_id')
            ->leftJoin('programmedetails', 'programmesoustitres.id', 'programmedetails.programmesoustitre_id')
            ->select('programmesoustitres.nom as soustitre', 'programmedetails.nom as detail')
            ->orderBy('programmesoustitres.ordre')
            ->get()->groupBy('soustitre');

    }
    public function render()
    {
        return view('livewire.formations.formation-show');
    }
}
