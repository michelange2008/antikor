<?php

namespace App\Livewire;

use App\Livewire\Forms\FormationForm;
use App\Models\Document;
use App\Models\Duree;
use App\Models\Espece;
use App\Models\Formation;
use App\Models\Intervenant;
use App\Models\Modalite;
use App\Models\Pedagogie;
use App\Models\Stagiaire;
use Livewire\Component;

class FormationMainEdit extends Component
{
    public FormationForm $form;
    public $objectifpedago;
    public $durees;
    public $stagiaires;
    public $intervenants;
    public $especes;
    public $modalites;
    public $pedagogies;
    public $documents;

    function mount(Formation $formation)
    {
        $this->durees = Duree::all();
        $this->stagiaires = Stagiaire::all();
        $this->intervenants = Intervenant::all();
        $this->especes = Espece::all();
        $this->modalites = Modalite::all();
        $this->pedagogies = Pedagogie::all();
        $this->documents = Document::all();
        $this->form->setFormation($formation);
        
    }

    function updated($name, $value)
    {
        $this->form->update([
            $name => $value,
        ]);
        $this->dispatch('formation_updated', title: "Mise à jour effectuée");
    }

    /**
     * Appelle la fonction toggle de FormationForm
     *
     * Pour la description @see toggle() de FormationForm
     * 
     */
    function toggle($model_id, $table, $sens)
    {
        $this->form->toggle($model_id, $table, $sens);
    }


    public function render()
    {
        return view('livewire.formation-main-edit');
    }
}
