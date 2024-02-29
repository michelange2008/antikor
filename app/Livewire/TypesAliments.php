<?php

namespace App\Livewire;

use App\Models\Altype;
use Livewire\Component;

class TypesAliments extends Component
{
    public $altypes;
    public $editItem = [];
    public $nouvelItem = [];
    public $couleurs = [];
    public $titre = "Types d'aliments";
    public $editMode = 0;
    public $libelles = [];

    public function mount()
    {
        $this->altypes = Altype::all();
        $this->libelles = config('aliments.types_libelles');
        $this->editItem['id'] = '';    
    }

    public function edit($editItem_id)
    {
        $this->editMode = $editItem_id;
        $this->editItem = Altype::find($editItem_id)->toArray();
    }

    public function update()
    {
        $this->editMode = 0;
        Altype::where('id', $this->editItem['id'])
            ->update([
                "nom" => $this->editItem['nom'],
                "couleur" => $this->editItem['couleur'],
            ]);
        $this->altypes = Altype::all();
    }

    public function store()
    {
        try {
            $this->nouvelItem['couleur'];
        } catch (\Throwable $th) {
            $this->nouvelItem['couleur'] = "#111111";
        }
        $altype = new Altype();
        $altype->nom = $this->nouvelItem['nom'];
        $altype->couleur = $this->nouvelItem['couleur'];
        $altype->save();
        $this->nouvelItem = [];
        $this->altypes = Altype::all();
    }

    public function destroy($altype_id)
    {
        Altype::destroy($altype_id);
        $this->altypes = Altype::all();
    }

    public function render()
    {
        return view('livewire.types-aliments');
    }
}
