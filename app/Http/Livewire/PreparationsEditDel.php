<?php

namespace App\Http\Livewire;

use App\Models\Phytoprep;
use Livewire\Component;

class PreparationsEditDel extends Component
{
    public Phytoprep $preparation;

    protected $rules = [
        'preparation.name' => 'required|string|min:2|max:191',
        'preparation.officiel' => 'required|string|min:2|max:191',
        'preparation.detail' => 'string|max:3000',
    ];

    public function update()
    {
        $this->validate();
        sleep(3);
    }

    public function render()
    {
        return view('livewire.preparations-edit-del');
    }
}
