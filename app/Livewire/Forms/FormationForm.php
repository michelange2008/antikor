<?php

namespace App\Livewire\Forms;

use App\Models\Formation;
use App\Models\Objectifpedago;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormationForm extends Form
{
    public Formation $formation;

    #[Validate('required', message: "Merci de définir un nom")]
    #[Validate('min:3', message: "Ce nom est trop court")]
    #[Validate('max:191', message: "Ce nom est trop long")]
    public $name = '';

    #[Validate('max:191', message: "Ce nom est trop long")]
    public $subname = '';

    #[validate('max:65000', message: "Ce nom est trop long")]
    public $contexte = '';

    public $icone = '';
    public $duree_id = '';
    public $stagiaire_id = '';
    public $intervenant_id = '';
    public $formation_especes;
    public $formation_modalites;
    public $formation_pedagogies;
    public $formation_documents;

    public function setFormation(Formation $formation)
    {
        $this->formation = $formation;
        $this->id = $formation->id;
        $this->name = $formation->name;
        $this->subname = $formation->subname;
        $this->contexte = $formation->contexte;
        $this->icone = $formation->icone;
        $this->duree_id = $formation->duree_id;
        $this->stagiaire_id = $formation->stagiaire_id;
        $this->intervenant_id = $formation->intervenant_id;
        $this->formation_especes = $formation->especes->pluck('id')->toArray();
        $this->formation_modalites = $formation->modalites->pluck('id')->toArray();
        $this->formation_pedagogies = $formation->pedagogies->pluck('id')->toArray();
        $this->formation_documents = $formation->documents->pluck('id')->toArray();
    }

    public function update()
    {
        $this->validate();
        $this->formation->update($this->only('name', 'subname', 'contexte', 'duree_id', 'stagiaire_id', 'intervenant_id'));
    }

    /**
     * Permet d'attacher ou détacher un modèle en relation ManyToMany au modèle Formation
     *
     * Concerne les modèles suivants: Modalite, Pedagogie, Intervenant
     * la ligne "$this->formation->$table()->$sens($model_id);"
     * se transforme ainsi en:
     * $this->formation->modalites->attach(3)
     *
     * @param Int $model_id : Id du model que l'on veut attacher ou détacher
     * @param String $table : nom de la table du modèle à attacher ou détacher
     * @param String $sens : 'attach' pour attacher, 'detach' pour détacher
     **/
    function toggle($model_id, $table, $sens)
    {
        // Mise à jour de la table pivot
        $this->formation->$table()->$sens($model_id);
        // Mise à jour de l'affichage
        $parametre = 'formation_'.$table;
        $this->$parametre = $this->formation->$table->pluck('id')->toArray();
    }

}
