<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use App\Models\Phytoproduit;
use App\Models\Phytotype;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

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

    protected $listeners = [
        'preparationUpdated' => 'mount',
    ];
    
    public function mount()
    {
        $this->types = Phytotype::all();
        $this->produits = Phytoproduit::all();
    }
    
    public function update()
    {
        $this->validate();
        $this->preparation->save();
        $this->edit = false;
        $this->emit('preparationUpdated');


    }

    public function delete_preparation()
    {
        Storage::delete(url('storage/img/icones/'.$this->preparation->icone));
        $this->preparation->destroy($this->preparation->id);
        $this->del_prep = false;
        $this->emitUp('preparationDeleted');

    }

    public function render()
    {
        return view('livewire.preparations-edit-del');
    }
}
