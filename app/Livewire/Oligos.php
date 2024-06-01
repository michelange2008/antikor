<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
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
    public array $apports_mineral;
    public array $apports_alim;
    public array $besoins;
    public array $besoinsTotaux;
    public array $valeurs;
    public array $carences;
    public array $toxicite;
    public array $max_reglem;
    public array $bilan;
    #[Validate('required|numeric', as: 'quantité distribuée')]
    public int $quantite;
    #[Validate('required|numeric', as: 'MSI')]
    public float $msi;
    public array $ateliersActifs;
    public array $stadesActif;

    function mount()
    {
        // Liste des oligo-éléments et des vitamines
        $this->oligovitamines = config('oligo.oligovitamines');
        $this->valeurs = config('oligo.valeurs');

        // Initiation des valeurs par défaut
        $this->stade = config('oligo.init.stade'); // Stade initial
        $this->atelier = config('oligo.init.atelier'); // Atelier initial
        $this->espece = explode( '_', $this->atelier)[0]; // Espèce initiale
        $this->quantite = config('oligo.init.quantite'); // Quantité de minéral distribué initial
        // Espèces, ateliers et stades disponibles
        $this->especes = config('oligo.especes');
        $this->ateliers = config('oligo.ateliers');
        $this->setProduction();
        $this->stades = config('oligo.stades');
        $this->ateliersActifs = config('oligo.ateliersActifs');
        
        $this->mineral = config('oligo.init.mineral');
        $this->bilan = config('oligo.init.mineral');
        $this->setMSI();
        $this->maj();
    }

    function setEspece($espece)
    {
        $this->espece = $espece;
        $this->atelier = 'aucun';
        $this->stade = 'aucun';
        $this->setProduction();
        $this->setMSI();
        $this->maj();
    }
    function setAtelier($atelier)
    {
        $this->atelier = $atelier;
        $this->setProduction();
        $this->stade = ($this->production == 'crois') ? 'croissance' : 'aucun';
        $this->setMSI();
        $this->maj();
    }

    function setProduction()
    {
        $this->production = ($this->atelier == 'aucun') ? 'aucune' : explode('_', $this->atelier)[1];
    }

    function setStade($stade)
    {
        $this->stade = $stade;
        $this->setMSI();
        $this->maj();
    }

    function majMineral()
    {
        $this->maj();
    }

    function majMSI()
    {
        $this->validate();
        $this->maj();
    }

    function majQuantite()
    {
        $this->validate();
    }

    function maj()
    {
        $this->validate();
        $this->msi = round($this->msi, 1);
        $this->setStadesActifs();
        $this->setBesoins();
        $this->setApports();
        $this->calculBilan();
    }

    function setApports()
    {
        foreach ($this->oligovitamines as $type => $elements) {
            foreach ($elements as $element) {
                $this->mineral[$element] = ($this->mineral[$element] == '') ? 0 : $this->mineral[$element];
                $this->mineral[$element] = ($this->mineral[$element] < 0) ? 0 : $this->mineral[$element];
                $this->apports_mineral[$element] = $this->mineral[$element] * $this->quantite / 1000;
            }
        }
    }

    function setBesoins(): void
    {
        foreach ($this->valeurs as $oligo => $seuils) {
            foreach ($seuils as $seuil => $valeur) {
                if (!is_array($valeur)) {
                    $this->$seuil[$oligo] = $seuils[$seuil];
                } else {
                    foreach ($valeur as $parametre => $norme) {
                        if ($this->stade == $parametre) {
                            $this->$seuil[$oligo] = $norme;
                        } elseif ($this->espece == $parametre) {
                            $this->$seuil[$oligo] = $norme;
                        }
                    }
                }
            }
        }
    }

    function setMSI(): void
    {
        $msi = config('oligo.msi.' . $this->atelier . '.' . $this->stade);
        $this->msi = ($msi == null) ? 0 : $msi;
    }

    function setStadesActifs()
    {
        if ($this->atelier == 'aucun') {
            $this->stadesActif['croissance'] = false;
            $this->stadesActif['gestation'] = false;
            $this->stadesActif['lactation'] = false;
        } else {
            if ($this->production == 'crois') {
                $this->stadesActif['croissance'] = true;
                $this->stadesActif['gestation'] = false;
                $this->stadesActif['lactation'] = false;
            } elseif ($this->production === 'aucune') {
                $this->stadesActif['croissance'] = true;
                $this->stadesActif['gestation'] = true;
                $this->stadesActif['lactation'] = true;
            } else {
                $this->stadesActif['croissance'] = false;
                $this->stadesActif['gestation'] = true;
                $this->stadesActif['lactation'] = true;
            }
        }
    }

    function calculBilan(): void
    {

        foreach ($this->oligovitamines as $type => $oligoOuVitamines) {
            foreach ($oligoOuVitamines as $element) {
                // En l'absence de valeurs du minéral pour un élément, la valeur est mise à 0
                $this->mineral[$element] =
                    ($this->mineral[$element] == null) ? 0 : $this->mineral[$element];
                // Calcul des apports totaux en ppm ou mg
                $apport = ($this->apports_mineral[$element] + $this->apports_alim[$element]);
                // Calcul des besoins en fonctions de besoins de l'atelier et la MSI
                // Si les besoins varient selon l'espece ou le stade
                if (is_array($this->valeurs[$element]['besoins'])) {
                    if (array_key_exists( $this->stade, $this->valeurs[$element]['besoins'])) {
                        $this->besoinsTotaux[$element] = $this->valeurs[$element]['besoins'][$this->stade] * $this->msi;
                    } elseif (array_key_exists( $this->espece, $this->valeurs[$element]['besoins'])) {
                        $this->besoinsTotaux[$element] = $this->valeurs[$element]['besoins'][$this->espece] * $this->msi;
                    }
                } else {
                    $this->besoinsTotaux[$element] = $this->valeurs[$element]['besoins'] * $this->msi;
                }

                // Calcul de la toxicité
                $toxicite = $this->toxicite[$element];
                $carence = $this->carences[$element];

                // Définition des classes à afficher à fonction de l'équilibre/carence/toxicité
                // cf. app.css
                if ($this->atelier == 'aucun' || $this->stade == 'aucun' || $this->msi == 0) {
                    // Si  pas d'atelier et de stade défini, affichage gris
                    $this->bilan[$element] = 'notyetset';
                } else {
                    // Test de la toxicité
                    if ($apport >= $toxicite * $this->msi) {
                        // Si toxicité, affichage rouge foncé
                        $this->bilan[$element] = 'toxicite';

                        // Test des niveaux d'apport
                    } elseif ($apport < $carence * $this->msi) {
                        // Si carence, affichage rouge clair
                        $this->bilan[$element] = 'carence';
                    } else {
                        // Si équilibre, affichage vert
                        $this->bilan[$element] = 'equilibre';
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
