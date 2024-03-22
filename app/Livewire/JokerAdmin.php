<?php

namespace App\Livewire;

use Livewire\Component;

class JokerAdmin extends Component
{
    public $session;
    public array $types;
    public string $type;
    public array $nombres = [];
    public array $questions = [];
    public string $texte = '';
    public int $valeur = 0;



    public function mount()
    {
        $this->types = [
            ['categorie' => 'question', 'intitule' => "Valider une question"],
            ['categorie' => 'nombre', 'intitule' => "Répondre par un nombre"],
            ['categorie' => 'qcm', 'intitule' => "QCM"],
            ['categorie' => 'qcu', 'intitule' => "QCU"],
        ];
    }

    public function choixType()
    {
          
    }

    public function creeNombre()
    {
        $this->nombres[] = [
            "texte" => $this->texte,
            "valeur" => $this->valeur,
        ];
        $this->texte = '';
        $this->valeur = 0;
    }

    public function render()
    {
        return view('livewire.joker.joker-admin');
    }
}
