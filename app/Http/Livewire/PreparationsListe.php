<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use App\Traits\LitJson;
use Livewire\Component;

class PreparationsListe extends Component
{
    use LitJson;

    public $liste;
    public $texte = 'liste_preps';
    public $icone = 'preps.svg';
    private $cols; 

    public function mount()
    {
        $this->liste = Phytoprep::all();
        $this->icone;
        $this->texte;
        $this->cols =$this->litJson('preparations');
    }

    public function render()
    {
        return view('livewire.preparations-liste', [
            'cols' => $this->cols,
        ]);
    }
}
