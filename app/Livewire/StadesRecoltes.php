<?php

namespace App\Livewire;

use App\Models\Alstade;
use Livewire\Component;

class StadesRecoltes extends Component
{
    public $alstades;
    public $editItem = [];
    public $nouvelItem = [];
    public $titre = "Stades de récolte";
    public $editMode = 0;
    public $libelles = [];

    public function mount()
    {
        $this->alstades = Alstade::all();
        $this->libelles = config('aliments.stades_libelles');
        $this->editItem['id'] = '';    
    }

    public function edit($editItem_id)
    {
        $this->editMode = $editItem_id;
        $this->editItem = Alstade::find($editItem_id)->toArray();
    }

    public function update()
    {
        $this->editMode = 0;
        Alstade::where('id', $this->editItem['id'])
            ->update([
                "nom" => $this->editItem['nom'],
            ]);
        $this->alstades = Alstade::all();
    }

    public function store()
    {
        $Alstade = new Alstade();
        $Alstade->nom = $this->nouvelItem['nom'];
        $Alstade->save();
        $this->nouvelItem = [];
        $this->alstades = Alstade::all();
    }

    public function destroy($item_id)
    {
        Alstade::destroy($item_id);
        $this->alstades = Alstade::all();
    }


    public function render()
    {
        return view('livewire.stades-recoltes');
    }
}
