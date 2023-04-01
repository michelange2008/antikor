<?php

namespace App\Http\Livewire;

use App\Models\Phytoproduit;
use App\Models\Phytotype;
use Livewire\Component;
use Livewire\WithPagination;

class ProduitsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $searchType = '';
    public $editId = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'searchType' => ['except' => ''],
    ];

    protected $listeners = [
        'produitUpdated' => 'onProduitUpdated',
    ];

    public function startEdit(int $id)
    {
        $this->editId = $id;
    }

    public function selectType(int $phytotype_id)
    {
        $this->resetPage();
        $this->searchType = $phytotype_id;
    }

    public function tousTypes()
    {
        $this->reset('searchType');
    }

    public function onProduitUpdated()
    {
        $this->reset('editId');
    }

    public function updating($name, $value)
    {
        if ($name == 'search') {
            $this->resetPage();
        }
    }

    public function render()
    {
        return view('livewire.produits-table', [
            'produits' => Phytoproduit::
                            where('name', 'LIKE', "%{$this->search}%")
                            ->where('phytotype_id', 'LIKE', "%{$this->searchType}%")
                            ->orderBy('name')
                            ->get(),
            'phytotypes' => Phytotype::all(),
        ]);
    }
}
