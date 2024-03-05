<?php

namespace App\Livewire;

use App\Models\Aliment;
use App\Models\Alstade;
use App\Models\Altype;
use Illuminate\Validation\Rules\Can;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Aliments extends Component
{
    public $liste_aliments;
    public $altypes;
    public $alstades;
    #[Validate('required', as:'Type')]
    public $altype_id = '';
    #[Validate('required|max:191', as: "Nom")]
    public $nom = '';
    public $alstade_id = '';
    #[Validate('required|numeric', as:"MS")]
    public $MS = '';
    public $Ptot = '';
    #[Validate('required|numeric|max:1000', as: "P absorb.")]
    public $P = '';
    public $Catot = '';
    #[Validate('required|numeric|max:1000', as: "Ca absorb.")]
    public $Ca = '';
    public Aliment $aliment;
    public $openModal = false;
    public $editModal = 0;
    public string $link_root;

    function mount()
    {
        $this->liste_aliments = Aliment::all();
        $this->altypes = Altype::all();
        $this->alstades = Alstade::all();
        $this->link_root = config('aliments.link_root');
    }

    function create()
    {
        $this->validate(); 
        $this->alstade_id = ($this->alstade_id == '') ? null : $this->alstade_id;
        $this->Ptot = ($this->Ptot == '') ? null : $this->Ptot;
        $this->Catot = ($this->Catot == '') ? null : $this->Catot;
        Aliment::create(
            $this->only(['altype_id', 'nom', 'alstade_id', 'MS', 'Ptot', 'P', 'Catot', 'Ca'])
        );
        $this->openModal = false;
        $this->liste_aliments = Aliment::all();
        $this->raz();
    }

    function edit($aliment_id)
    {
        $this->aliment= Aliment::find($aliment_id);
        $this->editModal = $aliment_id;
        $this->altype_id = $this->aliment->altype_id;    
        $this->nom = $this->aliment->nom;    
        $this->alstade_id = $this->aliment->alstade_id;    
        $this->MS = $this->aliment->MS;    
        $this->Ptot = $this->aliment->Ptot;    
        $this->P = $this->aliment->P;    
        $this->Catot = $this->aliment->Catot;    
        $this->Ca = $this->aliment->Ca;    
    }

    function store()
    {
        $this->validate(); 
        Aliment::where('id', $this->aliment->id)
            ->update([
                'altype_id' => $this->altype_id,
                'nom' => $this->nom,
                'alstade_id' => $this->alstade_id,
                'MS' => $this->MS,
                'Ptot' => $this->Ptot,
                'P' => $this->P,
                'Catot' => $this->Catot,
                "Ca" => $this->Ca,
            ]);   
        $this->liste_aliments = Aliment::all();
        $this->editModal = 0;
        $this->raz();
    }

    function raz()
    {
        $this->altype_id = '';
        $this->nom = '';
        $this->alstade_id = '';
        $this->MS = '';
        $this->Ptot = '';
        $this->P = '';
        $this->Catot = '';
        $this->Ca = '';
       
    }

    function delete($aliment_id)
    {

        Aliment::destroy($aliment_id);    
        $this->liste_aliments = Aliment::all();
    }

    function render()
    {
        return view('livewire.aliments');
    }
}
