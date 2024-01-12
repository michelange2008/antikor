<?php

namespace App\Livewire\Formations;

use App\Livewire\Formations\Forms\FormationForm;
use App\Models\Document;
use App\Models\Duree;
use App\Models\Espece;
use App\Models\Intervenant;
use App\Models\Modalite;
use App\Models\Pedagogie;
use App\Models\Stagiaire;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormationCreate extends Component
{
    use WithFileUploads;
    
    public FormationForm $formation;
    
    public $especes;
    public $listespeces = [];
    public $durees;
    public $stagiaires;
    public $intervenants;
    public $modalites;
    public $listeModalites = [];
    public $pedagogies;
    public $listePedagogies = [];
    public $documents;
    public $listeDocuments = [];
    public $listeObjectifs = [];
    public $nomObjectif;

    function mount()
    {
        $this->especes = Espece::all();  
        $this->durees = Duree::all();
        $this->stagiaires = Stagiaire::all();  
        $this->intervenants = Intervenant::all();
        $this->modalites = Modalite::all();
        $this->pedagogies = Pedagogie::all();
        $this->documents = Document::all();
    }

    function create() {
        $this->formation->create(
            $this->listespeces, $this->listeModalites, 
            $this->listePedagogies, $this->listeDocuments);
    }

    function toggle(int $id, bool $isIn, String $table, String $list)
    {
        if($isIn) {
            $key = array_search($id, $this->$list); 
            array_splice($this->$list, $key, 1);
        } else {
            array_push($this->$list, $id);
        }
    }


    public function render()
    {
        return view('livewire.formations.formation-create');
    }
}
