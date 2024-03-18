<?php
namespace App\Traits;

use App\Models\Phytoproduit;
use Illuminate\Support\Collection;

trait CalculQttProduits {

    protected $listeProduitsIdAvecQtt = []; // Array avec id des produits en clef et qtt en valeur
    protected $listeProduitsAvecQtt; // Collection avec liste Phytoproduits avec un attribut quantite en plus

    public function calculQttProduits(Collection $listePreparations, int $nbStagiaires) : void {
        
        $produits = Phytoproduit::all();

        foreach ($produits as $produit) {
            
            foreach ($listePreparations as $preparation) {
                
                foreach ($preparation->produits as $produitInPreparation) {
                    
                    if ($produit->id == $produitInPreparation->id) {

                        if (array_key_exists($produit->id, $this->listeProduitsIdAvecQtt)) {

                            $this->listeProduitsIdAvecQtt[$produit->id] += 
                            $preparation->produits->where('id', $produitInPreparation->id)->first()->pivot->quantite * $nbStagiaires;
                        
                        } else {

                            $this->listeProduitsIdAvecQtt[$produit->id] = 
                            $preparation->produits->where('id', $produitInPreparation->id)->first()->pivot->quantite * $nbStagiaires;

                        }
                        
                    }
                }
            }
        }

    }

    public function produitsAvecQuantite(Collection $listePreparations, int $nbStagiaires) : Collection {

        $this->calculQttProduits($listePreparations, $nbStagiaires);

        $this->listeProduitsAvecQtt = collect();
        foreach ($this->listeProduitsIdAvecQtt as $produit_id => $qtt) {
            $produit = Phytoproduit::find($produit_id);
            $produit->quantite = $qtt;
            $produit->aPrendre = true;
            $this->listeProduitsAvecQtt->push($produit);
        }

        return $this->listeProduitsAvecQtt;
    }
}