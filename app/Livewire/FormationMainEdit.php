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
    public $listespeces;

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
        $this->listespeces = $formation->especes()->pluck('id')->toArray();
    }

    function updated($name, $value)
    {
        $this->form->update([
            $name => $value,
        ]);
        $this->dispatch('formation_updated', title: "Mise à jour effectuée");
    }

    /**
     * Appelle la fonction toggle de FormationForm et modifie la liste d'id
     * Concerne les modèles attachés à Formation par une table pivot soit:
     *  - Espece, Modalite, Pedagogie, Document
     *
     * @param int $id: id de l'item à ajouter ou enlever de la table pivot et de la liste
     * @param bool $isIn: si true (déjà présent) il faut l'enlever, sinon on l'ajoute
     * @param string $table: nom de la table du modèle lié à formations par table pivot
     * @param string $list: liste des Id attachés à modèle Formation par la table pivot
     * 
     */
    function toggle(int $id, bool $isIn, String $table, String $list)
    {
        if($isIn) {
            $this->form->toggle($id, $table, 'detach');
            $key = array_search($id, $this->$list);
            array_splice($this->$list, $key, 1);
            
        } else {
            $this->form->toggle($id, $table, 'attach');
            array_push($this->$list, $id);
        }

    }


    public function render()
    {
        return view('livewire.formation-main-edit');
    }
}
