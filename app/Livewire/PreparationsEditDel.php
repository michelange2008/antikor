<?php

namespace App\Livewire;

use App\Models\Phytoprep;
use App\Models\Phytoproduit;
use App\Models\Phytotype;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class PreparationsEditDel extends Component
{
    use WithFileUploads;

    public Phytoprep $preparation;
    public $types;
    public $produits;
    public Bool $edit;
    public Bool $del_prep;
    public $icone;


    protected $rules = [
        'preparation.name' => 'required|string|min:2|max:191',
        'preparation.officiel' => 'required|string|min:2|max:191',
        'preparation.detail' => 'max:3000',
        'icone' => 'max:50',
    ];

    protected $listeners = [
    ];

    public function mount()
    {
        $this->types = Phytotype::all();
        $this->produits = Phytoproduit::all();
    }

    public function update()
    {

        $this->validate();

        if ($this->icone != null) {
            $extension = $this->icone->getClientOriginalExtension();
            $file_name = $this->preparation->name . "." . $extension;
            $this->icone->storeAs('public/img/icones', $file_name);
            $this->preparation->icone = $file_name;
        }

        $this->preparation->save();
        $this->edit = false;
        $this->emitUp('preparationUpdated');
    }

    public function delete_preparation()
    {
        Storage::delete(url('storage/img/icones/' . $this->preparation->icone));

        $this->preparation->destroy($this->preparation->id);
        $this->del_prep = false;
        $this->emitUp('preparationDeleted');
    }

    public function render()
    {
        return view('livewire.preparations-edit-del');
    }
}
