<?php

namespace App\Livewire\Formations\Forms;

use App\Models\Programmesoustitre;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SoustitreForm extends Form
{
    public Programmesoustitre $programmesoustitre;

    #[Rule('required', message: "Ce champs ne peut être vide!")]
    #[Rule('max:191', message: "Ce texte est trop long!")]
    #[Rule('min:3', message: "Ce texte est trop court!")]
    public $nom = '';

    #[Rule( 'required|numeric', message: "Il fut obligatoirement fournir une valeur numérique.")]
    public $ordre = '';

    public $formation_id = '';

    function setSoustitre(Programmesoustitre $programmesoustitre)
    {
        $this->programmesoustitre = $programmesoustitre;

        $this->nom = $programmesoustitre->nom;

        $this->ordre = $programmesoustitre->ordre;
    }

    function update()
    {
        $this->validate();
        $this->programmesoustitre
            ->update($this->only('nom', 'ordre'));    
    }

    function store($formation_id)
    {
        $this->validate();
        $nouveau_soustitre = new Programmesoustitre();
        $nouveau_soustitre->nom = $this->nom;
        $nouveau_soustitre->ordre = $this->ordre;
        $nouveau_soustitre->formation_id = $formation_id;
        $nouveau_soustitre->save();
        $this->nom = '';
        $this->ordre = '';
    }

    function delete()
    {
        $this->programmesoustitre->delete();    
    }
}
