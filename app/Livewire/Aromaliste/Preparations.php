<?php

namespace App\Livewire\Aromaliste;

use App\Models\Phytoprep;
use App\Models\Phytotype;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class Preparations extends Component
{
    use WithFileUploads;

    public Phytoprep $preparation; // préparation en cours d'édition
    public $nouvelle_preparation = []; // array pour la nouvelle preparation
    public $preparations; // Liste des préparations
    #[Validate('required|string|max:50', as: 'nom')]
    public $name; // Nom de la préparation
    #[Validate('required|string|max:50', as: 'nom officiel')]
    public $officiel; // Nom officiel de la préparation
    #[Validate('max:6500', as: 'description')]
    public $detail; // Détail de la préparation encore appelé description
    #[Validate('max:65000', as: 'fabrication')]
    public $fabrication; // Mode de fabrication de la préparation
    #[Validate('nullable|image|max:50', as: 'icone')]
    public $icone; // Icone de la préparation
    public $icone_name = "default.svg"; // Nom par défaut de l'icone
    public $types; // Types de produits
    public String $texte_titre = 'liste_preps'; // titre de la page
    public String $icone_titre = 'preps_light.svg'; // icone de la page
    public int $showDetail = 0; // Id de la préparation dont on veut le détail
    public bool $editPrep = false ; // Préparation en voie d'édition ou non
    public int $showComposition = 0; // Id de la préparation que l'on modifie
    public string $message = '';
    public string $typeMessage = '';

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
        if ($this->icone == null) {
            $file_name = $this->icone_name;
        } else {
            $extension = $this->icone->getClientOriginalExtension();
            $file_name = $this->name.".".$extension;
            $this->icone->storeAs('public/img/icones', $file_name);
        }    
        
        $prep = new Phytoprep();
        $prep->name = $this->name;
        $prep->officiel = $this->officiel;
        $prep->detail = $this->detail;
        $prep->fabrication = $this->fabrication;
        $prep->icone = $file_name;
        $prep->save();
        
        $this->maj();
        
    }    

    public function delete($preparation_id)
    {
        $prep = Phytoprep::find($preparation_id);
        $prep->produits()->detach();
        $prep->delete();
        $this->maj();    
    }    

    public function showDetails($preparation_id)
    {
        $this->preparation = Phytoprep::find($preparation_id);
        $this->showDetail =  $preparation_id;
    }    

    public function closeDetail()
    {
        $this->showDetail = 0;
        $this->editPrep = false;
    }

    function edit($preparation_id)
    {
        $this->editPrep = true;
        $this->dispatch('preparation_edited', preparation_id: $preparation_id);    
    }

    public function editComposition($preparation_id)
    {
        $this->dispatch('composition_edited', preparation_id: $preparation_id);
        $this->showComposition = $preparation_id;
    }

    public function maj()
    {
        $this->preparations = Phytoprep::all();
        $this->showDetail = 0;
    }  
    
    #[On('preparation_updated')]
    public function preparationUpdated($preparation_id)
    {
        $this->preparation = Phytoprep::find($preparation_id);
        $this->editPrep = false;  
    }

    #[On('composition_updated')]
    public function compositionUpdated($preparation_id)
    {
        $this->preparation = Phytoprep::find($preparation_id);
        $this->showDetail = $preparation_id;
    }

    #[On('composition_closeEdit')]
    public function compositionCloseEdit($preparation_id)
    {
        $this->preparation = Phytoprep::find($preparation_id);
        $this->showComposition = 0;
        $this->showDetail = $preparation_id;    
    }

    public function render()
    {
        return view('livewire.aromaliste.preparations');
    }
}
