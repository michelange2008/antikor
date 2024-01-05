<?php

namespace App\Livewire\Forms;

use App\Models\Programmedetail;
use Livewire\Attributes\Rule;
use Livewire\Form;

class DetailForm extends Form
{
    public Programmedetail $programmedetail;

    #[Rule('required', message: "Le texte ne peut être vide")]
    #[Rule('max:191', message: "Ce texte est trop long!")]
    public $nom = '';

    public $programmesoustitre_id = '';

    public $formation_id = '';

    function setDetail(Programmedetail $programmedetail)
    {
        $this->programmedetail = $programmedetail;
        $this->nom = $programmedetail->nom;
        $this->programmesoustitre_id= $programmedetail->programmesoustitre_id;
    }

    function update()
    {
        $this->validate();
        $this->programmedetail->update($this->only('nom'));    
    }

    function store($programmesoustitre_id)
    {
        $this->validate();
        $nouveau_detail = new Programmedetail();
        $nouveau_detail->nom = $this->nom;
        $nouveau_detail->programmesoustitre_id = $programmesoustitre_id;
        $nouveau_detail->save();    
    }

    function delete()
    {
        $this->programmedetail->delete();    
    }
}
