<?php

namespace App\Livewire;

use Livewire\Component;

class JokerAdmin extends Component
{
    public $type;
    public array $questions = [];
    public string $texte = '';
    public int $valeur = 0;

    public function mount()
    {
        $this->questions = [
            ["texte" => "Marignan", "valeur" => 1515],
            ["texte" => "Mort Henri IV", "valeur" => 1610],
        ];
    }

    public function choixType()
    {
          
    }

    public function creeNombre()
    {
        $this->questions[] = [
            "texte" => $this->texte,
            "valeur" => $this->valeur,
        ];
        $this->texte = '';
        $this->valeur = 0;
    }

    public function render()
    {
        return view('livewire.joker-admin');
    }
}
