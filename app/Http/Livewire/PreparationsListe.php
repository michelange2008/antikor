<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use App\Models\Phytotype;
use Livewire\Component;
use Livewire\WithFileUploads;

class PreparationsListe extends Component
{
    use WithFileUploads;

    public $preparation;
    public $icone;
    public $preparations;
    public $types; 
    public String $texte_titre = 'liste_preps';
    public String $icone_titre = 'preps_light.svg';
    public Bool $edit  = false ;

    protected $rules = [
        'preparation.name' => 'required|string|max:50',
        'preparation.officiel' => 'required|string|max:50',
        'preparation.detail' => 'max:65000',
        'preparation.fabrication' => 'max:65000',
        'icone' => 'image|max:50',
    ];

    protected $listeners = [
        'preparationDeleted' => 'mount',
        'preparationCreated' => 'mount',
        'preparationUpdated' => 'mount',
    ];

    

    public function mount()
    {
        $this->preparation = new Phytoprep();

        $this->preparations = Phytoprep::all();
        $this->types = Phytotype::all();
        $this->icone_titre;
        $this->texte_titre;
    }

    public function add_preparation()
    {
        $this->validate();

        $extension = $this->icone->getClientOriginalExtension();
        $file_name = $this->preparation->name.".".$extension;
        $this->icone->storeAs('public/img/icones', $file_name);
        $this->preparation->icone = $file_name;
        $this->preparation->save();
        $this->emit('preparationCreated');

    }

    public function render()
    {
        return view('livewire.preparations-liste');
    }
}
