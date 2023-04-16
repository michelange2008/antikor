<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use App\Models\Phytoproduit;
use App\Models\Phytotype;
use Livewire\Component;

class PreparationsEditDel extends Component
{
    public Phytoprep $preparation;
    public $types;
    public $produits;
    public Bool $edit;
    public Bool $del_prep;


    protected $rules = [
        'preparation.name' => 'required|string|min:2|max:191',
        'preparation.officiel' => 'required|string|min:2|max:191',
        'preparation.detail' => 'string|max:3000',
    ];
    
    public function mount()
    {
        $this->types = Phytotype::all();
        $this->produits = Phytoproduit::all();
    }
    
    public function update()
    {
        $this->edit = false;
        $this->validate();
        $this->preparation->save();
        $this->emit('preparationUpdated');

    }

    public function delete_preparation()
    {
        $this->del_prep = false;
        dd($this->preparation);
    }

    public function render()
    {
        return view('livewire.preparations-edit-del');
    }
}
