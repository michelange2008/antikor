<?php

namespace App\Livewire;

use Livewire\Component;

class Oligos extends Component
{
    public string $atelier;
    public string $stade;
    public array $mineral;
    public array $listeOligos;
    public array $besoins;
    public array $bilan;
    public int $quantite;
    public float $msi;

    public $min = [];

    function mount()
    {
        $this->listeOligos = config('oligo.listeOligos'); 

        $this->quantite = config('oligo.init.quantite'); // Quantité de minéral distribué initial
        $this->atelier = config('oligo.init.atelier'); // Atelier initial
        $this->stade = config('oligo.init.stade'); // Stade initial
        
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
        
        foreach ($this->listeOligos as $oligo => $oligoelement) {
            $this->mineral[$oligo] = ($this->mineral[$oligo] == null) ? 0 : $this->mineral[$oligo];
            $apport = $this->mineral[$oligo] * $this->quantite / 1000;
            $besoin = $this->besoins[$oligo] * $this->msi;
            $seuil_toxicite = config('oligo.tox.' . $this->getEspece() . '.' . $oligo);
            $marge_haute =  (1 + config('oligo.tolerance')) * $besoin;
            $marge_basse = (1 - config('oligo.tolerance')) * $besoin;
            
            // Test de la toxicité
            if ($apport >= $seuil_toxicite * $this->msi) {
                $this->bilan[$oligo] = 'toxicite';

            // Test des niveaux d'apport
            } else {
                if ($apport > $marge_haute ) {

                    $this->bilan[$oligo] = 'exces';

                } elseif ($apport < $marge_basse ) {

                    $this->bilan[$oligo] = 'carence';

                } else {

                    $this->bilan[$oligo] = 'equilibre';

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
