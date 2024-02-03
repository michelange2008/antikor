<?php

namespace App\Livewire;

use Livewire\Component;

class Oligos extends Component
{
    public array $especes;
    public string $espece;
    public string $atelier;
    public string $production;
    public array $productions;
    public array $ateliers;
    public string $stade;
    public array $mineral;
    public array $oligovitamines;
    public array $besoins;
    public array $bilan;
    public int $quantite;
    public float $msi;

    public $min = [];

    function mount()
    {
        $this->oligovitamines = config('oligo.oligovitamines'); 

        $this->quantite = config('oligo.init.quantite'); // Quantité de minéral distribué initial
        $this->atelier = config('oligo.init.atelier'); // Atelier initial
        $this->stade = config('oligo.init.stade'); // Stade initial
        $this->espece = config('oligo.init.espece'); // Espece initiale
        $this->production = config('oligo.init.production');

        $this->especes = config('oligo.especes');
        $this->productions = config('oligo.productions');
        $this->ateliers = config('oligo.ateliers');
        
        $this->mineral = config('oligo.init.mineral');
        $this->bilan = config('oligo.init.mineral');
        $this->maj();
    }
    function toggle($parametre, $valeur)
    {
        $this->$parametre = $valeur;
        $this->maj();
    }

    function setBesoins(): void
    {
        $this->besoins = config('oligo.besoins.' . $this->atelier);
    }

    function setMSI(): void
    {
        $this->msi = config('oligo.msi.' . $this->atelier . '.' . $this->stade);
    }

    function calculBilan(): void
    {
        
        foreach ($this->oligovitamines as $type => $oligoOuVitamines) {
            foreach ($oligoOuVitamines as $abbreviation => $nom) {
                # code...
                $this->mineral[$abbreviation] = ($this->mineral[$abbreviation] == null) ? 0 : $this->mineral[$abbreviation];
                $apport = $this->mineral[$abbreviation] * $this->quantite / 1000;
                $besoin = $this->besoins[$abbreviation] * $this->msi;
                $seuil_toxicite = config('oligo.toxicites.' . $this->getEspece() . '.' . $abbreviation);
                $marge_haute =  (1 + config('oligo.tolerance')) * $besoin;
                $marge_basse = (1 - config('oligo.tolerance')) * $besoin;
                
                // Test de la toxicité
                if ($apport >= $seuil_toxicite * $this->msi) {
                    $this->bilan[$abbreviation] = 'toxicite';
    
                // Test des niveaux d'apport
                } else {
                    if ($apport > $marge_haute ) {
    
                        $this->bilan[$abbreviation] = 'exces';
    
                    } elseif ($apport < $marge_basse ) {
    
                        $this->bilan[$abbreviation] = 'carence';
    
                    } else {
    
                        $this->bilan[$abbreviation] = 'equilibre';
    
                    }
                }
            }
        }
    }
    
    function getEspece(): string
    {

        return explode('_', $this->atelier)[0];
    }

    function maj()
    {
        $this->atelier = $this->espece.'_'.$this->production;
        $this->setBesoins();
        $this->setMSI();
        $this->calculBilan();
    }

    function majMineral()
    {
        foreach ($this->min as $nomOligo => $qttOligo) {

            $this->mineral[$nomOligo] = $qttOligo;
        
        } 
        
        $this->maj();   
    }

    public function render()
    {
        return view('livewire.oligos');
    }
}
