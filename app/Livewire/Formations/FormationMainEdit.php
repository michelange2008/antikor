<?php

namespace App\Livewire\Formations;

use App\Livewire\Formations\Forms\FormationForm;
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
    public $listeModalites;
    public $listePedagogies;
    public $listeDocuments;

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
        $this->listeModalites = $formation->modalites()->pluck('modalite_id')->toArray();
        $this->listePedagogies = $formation->pedagogies()->pluck('pedagogie_id')->toArray();
        $this->listeDocuments = $formation->documents()->pluck('document_id')->toArray();
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
    /**
     * Mise à jour des champs en lien belongsTo
     * 
     * Durée (duree_id), Stagiaires (stagiaire_id) et Intervenant (intervenant_id)
     * Cette fonction est appelée par les 3 champs select de formation-main-edit 
     *
     * @param [type] $name: nom du champs
     * 
     * Appelle la fonction change de FormationForm qui fait la mise à jour
     */
    function maj($name)
    {
        $this->form->change($name, $this->form->$name);
    }


    public function render()
    {
        return view('livewire.formations.formation-main-edit');
    }
}
