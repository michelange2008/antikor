<?php

namespace App\Livewire\Aromaliste;

use App\Models\Phytoprep;
use App\Models\Phytotype;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Preparations extends Component
{
    use WithFileUploads;

    public $nouvelle_preparation = [];
    public $preparations;
    #[Validate('required|string|max:50', as: 'nom')]
    public $name;
    #[Validate('required|string|max:50', as: 'nom officiel')]
    public $officiel;
    #[Validate('max:6500', as: 'description')]
    public $description;
    #[Validate('max:65000', as: 'fabrication')]
    public $fabrication;
    #[Validate('image|max:50', as: 'icone')]
    public $icone;
    public $types; 
    public String $texte_titre = 'liste_preps';
    public String $icone_titre = 'preps_light.svg';
    public Bool $edit  = false ;
    public int $detail = 0;
    public bool $open = false;

    public function mount()
    {
        $this->preparations = Phytoprep::all();
        $this->types = Phytotype::all();
        $this->icone_titre;
        $this->texte_titre;
    }

    public function create()
    {
        $this->validate();

        $extension = $this->icone->getClientOriginalExtension();
        $file_name = $this->preparation->name.".".$extension;
        $this->icone->storeAs('public/img/icones', $file_name);
        $this->preparation->icone = $file_name;
        $this->preparation->save();
        
    }

    public function toggleDetail($preparation_id)
    {
        $this->detail = ($this->detail != $preparation_id) ? $preparation_id : 0;
    }

    public function maj()
    {
        $this->preparations = Phytoprep::all();
        $this->open = false;
        $this->detail = 0;
    }

    public function render()
    {
        return view('livewire.aromaliste.preparations');
    }
}
