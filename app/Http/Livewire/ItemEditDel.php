<?php

namespace App\Http\Livewire;

use App\Traits\LitJson;
use Livewire\Component;

class ItemEditDel extends Component
{
    use LitJson;

    public $item;

    private Mixed $cols;

    public function __construct()
    {
        $this->cols =$this->litJson('preparations');
    }

    public function update()
    {
        
        foreach ($this->cols->champs as $intitule => $col) {
            dump($col->name);
        }
    }

    public function render()
    {
        return view('livewire.item-edit-del', [
            'cols' => $this->cols,
        ]);
    }
}
