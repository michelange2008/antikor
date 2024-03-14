<?php

namespace App\Livewire\Aromaliste;

use App\Models\Phytoprep;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PreparationEdit extends Component
{
    use WithFileUploads;

    public Phytoprep $preparation; // préparation en cours d'édition
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
    
    public function mount()
    {
        $this->preparation = Phytoprep::find(1);    
    }

    #[On('preparation_edited')]
    public function edit($preparation_id)
    {
        $this->preparation = Phytoprep::find($preparation_id);
        $this->name = $this->preparation->name;
        $this->officiel = $this->preparation->officiel;
        $this->detail = $this->preparation->detail;
        $this->fabrication = $this->preparation->fabrication;
        $this->icone_name = $this->preparation->icone;
    }

    public function updatePrep()
    {
        $this->validate();
        if ($this->icone == null) {
            $file_name = $this->icone_name;
        } else {
            $extension = $this->icone->getClientOriginalExtension();
            $file_name = $this->preparation->name.".".$extension;
            $this->icone->storeAs('public/img/icones', $file_name);
        }    
        
 
        Phytoprep::where('id', $this->preparation->id)
            ->update([
                'name' => $this->name,
                'officiel' => $this->officiel,
                'detail' => $this->detail,
                'fabrication' => $this->fabrication,
                'icone' => $file_name,
            ]);    
        
        // $this->preparation = Phytoprep::find($this->preparation->id);
        $this->dispatch('preparation_updated', preparation_id: $this->preparation->id);
    }        


    public function render()
    {
        return view('livewire.aromaliste.preparation-edit');
    }
}
