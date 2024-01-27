<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Config;

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
        $this->listeOligos = Config::get('oligo.listeOligos'); 

        $this->quantite = Config::get('oligo.init.quantite'); // Quantité de minéral distribué intial
        $this->atelier = Config::get('oligo.init.atelier'); // Atelier initial
        $this->stade = Config::get('oligo.init.stade'); // Stade initial
        // $this->msi = Config::get('oligo.msi.' . $this->atelier . '.' . $this->stade); // msi ingérée en fonction de l'espèce et du stade
        
        $this->mineral = Config::get('oligo.init.mineral');
        $this->bilan = Config::get('oligo.init.mineral');
        // $this->setBesoins();
        // $this->calculBilan();
        $this->maj();
    }
    function toggle($parametre, $valeur)
    {
        $this->$parametre = $valeur;
        $this->maj();
    }

    function setBesoins(): void
    {
        $this->besoins = Config::get('oligo.besoins.' . $this->atelier);
    }

    function setMSI(): void
    {
        $this->msi = Config::get('oligo.msi.' . $this->atelier . '.' . $this->stade);
    }

    function calculBilan(): void
    {
        
        foreach ($this->listeOligos as $oligo => $oligoelement) {
            $this->mineral[$oligo] = ($this->mineral[$oligo] == null) ? 0 : $this->mineral[$oligo];
            $apport = $this->mineral[$oligo] * $this->quantite / 1000;
            $besoin = $this->besoins[$oligo] * $this->msi;
            $seuil_toxicite = Config::get('oligo.tox.' . $this->getEspece() . '.' . $oligo);
            $marge_haute =  (1 + Config::get('oligo.tolerance')) * $besoin;
            $marge_basse = (1 - Config::get('oligo.tolerance')) * $besoin;
            
            // Test de la toxicité
            if ($apport >= $seuil_toxicite * $this->msi) {
                $this->bilan[$oligo] = 'toxicite';

            // Test des niveaux d'apport
            } else {
                if ($apport > $marge_haute ) {

                    $this->bilan[$oligo] = 'warning';

                } elseif ($apport < $marge_basse ) {

                    $this->bilan[$oligo] = 'danger';

                } else {

                    $this->bilan[$oligo] = 'apport-correct';

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
