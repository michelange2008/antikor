<?php

namespace App\Livewire;

use Livewire\Component;

class Oligos extends Component
{
    public array $especes;
    public string $espece;
    public string $atelier;
    public array $ateliers;
    public array $stades;
    public string $stade;
    public array $mineral;
    public array $oligovitamines;
    public array $besoins;
    public array $bilan;
    public int $quantite;
    public float $msi;
    public array $ateliersActifs;

    function mount()
    {
        // Liste des oligo-éléments et des vitamines
        $this->oligovitamines = config('oligo.oligovitamines');
        // Initiation des valeurs par défaut
        $this->stade = config('oligo.init.stade'); // Stade initial
        $this->espece = config('oligo.init.espece'); // Espece initiale
        $this->atelier = config('oligo.init.atelier'); // Atelier initial
        $this->quantite = config('oligo.init.quantite'); // Quantité de minéral distribué initial
        // Especes, ateliers et stades disponibles
        $this->especes = config('oligo.especes');
        $this->ateliers = config('oligo.ateliers');
        $this->stades = config('oligo.stades');
        $this->ateliersActifs = config('oligo.ateliersActifs');

        $this->mineral = config('oligo.init.mineral');
        $this->bilan = config('oligo.init.mineral');
        $this->maj();
    }

    function setEspece($espece)
    {
        $this->espece = $espece;
        $this->atelier = 'aucun'; 
        $this->setBesoins();   
    }    
    function setAtelier($atelier)
    {
        $this->atelier = $atelier;
        $this->maj();
    }    
    
    function setStade($stade)
    {
        $this->stade = $stade;    
        $this->maj();
    }    
    
    function majMineral()
    {
        $this->maj();
    }
    
    function maj()
    {
        $this->setBesoins();
        $this->setMSI();
        $this->calculBilan();
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
                $this->mineral[$type][$abbreviation] = 
                    ($this->mineral[$type][$abbreviation] == null) ? 0 : $this->mineral[$type][$abbreviation];
                $apport = $this->mineral[$type][$abbreviation] * $this->quantite / 1000;        
                $besoin = $this->besoins[$abbreviation] * $this->msi;
                $seuil_toxicite = config('oligo.toxicites.' . $this->espece . '.' . $abbreviation);
                $marge_haute =  (1 + config('oligo.tolerance')) * $besoin;
                $marge_basse = (1 - config('oligo.tolerance')) * $besoin;

                // Test de la toxicité
                if ($apport >= $seuil_toxicite * $this->msi) {
                    $this->bilan[$abbreviation] = 'toxicite';

                    // Test des niveaux d'apport
                } else {
                    if ($apport > $marge_haute) {

                        $this->bilan[$abbreviation] = 'exces';

                    } elseif ($apport < $marge_basse) {

                        $this->bilan[$abbreviation] = 'carence';

                    } else {

                        $this->bilan[$abbreviation] = 'equilibre';

                    }        
                }        
            }        
        }        
    }        

    public function render()
    {
        return view('livewire.oligos');
    }
}
