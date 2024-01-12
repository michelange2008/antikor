<?php

namespace App\Livewire\Formations\Forms;

use App\Models\Formation;
use App\Models\Objectifpedago;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class FormationForm extends Form
{
    use WithFileUploads;

    public Formation $formation;

    #[Validate('required', message: "Merci de définir un nom")]
    #[Validate('min:3', message: "Ce nom est trop court")]
    #[Validate('max:191', message: "Ce nom est trop long")]
    public $name = '';

    #[Validate('max:191', message: "Ce nom est trop long")]
    public $subname = '';

    #[validate('max:65000', message: "Ce nom est trop long")]
    public $contexte = '';
    #[Validate('image|max:1024', message:"Il faut un fichier image de moins de 250 Ko")] // 1MB Max
    public $icone;
    #[Validate('required', message: "Merci de définir une durée")]
    public $duree_id = '';
    #[Validate('required', message: "Merci de définir un type de stagiaires")]
    public $stagiaire_id = '';
    #[Validate('required', message: "Merci de définir un intervenant")]
    public $intervenant_id = '';


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

    }

    function create(array $list_especes, array $listeModalites, 
                        array $listePedagogies, array $listeDocuments)
    {
        $this->validate();
        // Attribution d'un nom de fichier à l'icone et stockage
        $nameIcone = str_replace(' ', '_', strtolower($this->name)).'.'.$this->icone->extension();
        $this->icone->storeAs('public/img/icones', $nameIcone);
        $this->icone = $nameIcone;

        $nouvelleFormation = Formation::create(
            $this->only(['name', 'subname', 'contexte', 'icone', 'duree_id', 'stagiaire_id', 'intervenant_id'])
        );
        
        $nouvelleFormation->especes()->sync($list_especes);
        $nouvelleFormation->modalites()->sync($listeModalites);
        $nouvelleFormation->pedagogies()->sync($listePedagogies);
        $nouvelleFormation->documents()->sync($listeDocuments);

        return redirect()->route('formations.edit', $nouvelleFormation);

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
     *      $this->formation->modalites->sync(3)
     *
     * @param Int $model_id : Id du model que l'on veut attacher ou détacher
     * @param String $table : nom de la table du modèle à attacher ou détacher
     * @param String $sens : 'attach' pour attacher, 'detach' pour détacher
     **/
    function toggle($model_id, $table, $sens)
    {
        // Mise à jour de la table pivot
        $this->formation->$table()->$sens($model_id);

    }

    /**
     * Fait le mise à jour des champs en relation belongsTo
     * 
     * Durée (duree_id), Stagiaires (stagiaire_id) et Intervenant (intervenant_id)
     *
     * @param [type] $champs: champs de la table formations à modifier
     * @param [type] $value: nouvelle valeur
     * @return void
     */
    function change($champs, $value)
    {
        $this->formation->update([$champs => $value]);    
    }

}
