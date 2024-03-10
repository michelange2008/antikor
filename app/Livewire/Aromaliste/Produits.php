<?php

namespace App\Livewire\Aromaliste;

use App\Models\Phytoproduit;
use App\Models\Phytotype;
use App\Models\Phytounite;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Produits extends Component
{
    use WithPagination;

    public Phytoproduit $produit;
    public $phytotypes;
    public $phytounites;

    public $produits;
    public $search = '';
    public $searchType = '';
    public $editId = 0;
    public $create = false;
    #[Validate('required|string|min:2|max:191', as: 'nom')]
    public string $name = '';
    #[Validate('required|integer', as: 'type')]
    public int $phytotype_id;
    #[Validate('required|integer', as: 'unité')]
    public int $phytounite_id;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'p'],
        'searchType' => ['except' => '', 'as' => 'type'],
    ];

    public function mount()
    {
        $this->produits = Phytoproduit::where('name', 'LIKE', "%{$this->search}%")
            ->where('phytotype_id', 'LIKE', "%{$this->searchType}%")
            ->orderBy('name')
            ->get();
        $this->phytotypes = Phytotype::all();
        $this->phytounites = Phytounite::all();
    }

    public function save()
    {
        $this->validate();
        Phytoproduit::create(
            $this->only(['name', 'phytotype_id', 'phytounite_id'])
        );
        $this->maj();
    }

    public function edit(int $id)
    {
        // Si on est déjà en mode édition: fermeture de la fenêtre d'édition
        if ($this->editId != 0) {
            $this->close();
            // Sinon on va rechercher le produit correspondant
        } else {
            $this->produit = PhytoProduit::find($id);
            $this->name = $this->produit->name;
            $this->phytotype_id = $this->produit->phytotype_id;
            $this->phytounite_id = $this->produit->phytounite_id;
            $this->editId = $id;
        }
    }

    public function update()
    {
        $this->validate();
        Phytoproduit::where('id', $this->editId)
                    ->update([
                        'name' => $this->name,
                        'phytotype_id' => $this->phytotype_id,
                        'phytounite_id' => $this->phytounite_id,
                    ]);
        $this->maj();
    }

    public function destroy($produit_id)
    {
        Phytoproduit::destroy($produit_id);
        $this->resetSearch();
        $this->maj();
    }

    /**
     * Ferme la fenêtre de modification d'un produit
     */
    public function close()
    {
        $this->editId = 0;
        $this->create = false;
    }

    /**
     * Sélectionne le type de produits recherchés
     *
     * @param integer $phytotype_id
     */
    public function selectType(int $phytotype_id)
    {
        $this->searchType = $phytotype_id;
        $this->maj();
    }

    /**
     * FONCTIONS DE RECHERCHE
     * 
     * Affiche tous les produits
     *
     */
    public function resetSearch()
    {
        $this->reset('search');
        $this->reset('searchType');
        $this->maj();
    }

    /**
     * FONCTIONS DE RECHERCHE
     *
     * Met à jour à la liste en fonction de la saisie
     * @param string $name: champs de recherche
     * @param string $value: motif recherché
     * @return void
     */
    public function updating($name, $value)
    {
        if ($name == 'search') {
            $this->search = $value;
            $this->maj();
        }
    }

    /**
     * Met à jour la liste des produits
     */
    public function maj()
    {
        $this->produits = Phytoproduit::where('name', 'LIKE', "%{$this->search}%")
            ->where('phytotype_id', 'LIKE', "%{$this->searchType}%")
            ->orderBy('name')
            ->get();
        $this->close();
    }

    public function render()
    {
        return view('livewire.aromaliste.produits');
    }
}
