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
    public string $production;
    public array $mineral;
    public array $oligovitamines;
    public array $besoins;
    public array $carences;
    public array $toxicites;
    public array $bilan;
    public int $quantite;
    public float $msi;
    public array $ateliersActifs;
    public array $stadesActif;

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
        $this->setProduction();
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
        $this->stade = 'aucun';
        $this->maj();
    }
    function setAtelier($atelier)
    {
        $this->atelier = $atelier;
        $this->setProduction();
        $this->stade = ($this->production == 'crois') ? 'cr' : $this->stade;
        $this->maj();
    }

    function setProduction()
    {
        if ($this->atelier != 'aucun') {
            $this->production = explode('_', $this->atelier)[1];
        }
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
        $this->setStadesActifs();
        $this->setBesoins();
        $this->setMSI();
        $this->calculBilan();
    }

    function setBesoins(): void
    {
        // $this->besoins = config('oligo.besoins.' . $this->atelier);
        foreach (config('oligo.valeurs') as $oligo => $seuils) {
            foreach ($seuils as $seuil => $valeur) {
                if (!is_array($valeur)) {
                    $this->$seuil[$oligo] = $seuils[$seuil];
                }
                else {
                    foreach ($valeur as $parametre => $norme) {
                        if ($this->stade == $parametre) {
                            $this->$seuil[$oligo] = $norme;

                        } elseif ($this->espece == $parametre) {
                            $this->$seuil[$oligo] = $norme ;
                        }
                    }
                }
            }
        }
        dd($this->toxicites);
    }

    function setMSI(): void
    {
        $msi = config('oligo.msi.' . $this->atelier . '.' . $this->stade);
        $this->msi = ($msi == null) ? 0 : $msi;
    }

    function setStadesActifs()
    {
        if ($this->production == 'crois') {
            $this->stadesActif['cr'] = true ;
            $this->stadesActif['ge'] = false;
            $this->stadesActif['la'] = false;
        }
        else {
            $this->stadesActif['cr'] = false;
            $this->stadesActif['ge'] = true;
            $this->stadesActif['la'] = true;
        }
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

                if ( $this->atelier == 'aucun' || $this->stade == 'aucun' ) {

                    $this->bilan[$abbreviation] = 'notyetset';
                } else {
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
    }

    public function render()
    {
        return view('livewire.oligos');
    }
}
