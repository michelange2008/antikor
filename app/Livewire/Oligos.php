<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
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
    public array $ajr;
    public array $ajr_totaux;
    public array $besoins;
    public array $besoinsTotaux;
    public array $apports_totaux;
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
        // dd($this->valeurs);
        // Initiation des valeurs par défaut
        $this->stade = config('oligo.init.stade'); // Stade initial
        $this->atelier = config('oligo.init.atelier'); // Atelier initial
        $this->espece = explode('_', $this->atelier)[0]; // Espèce initiale
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
        // $this->setApports();
        $this->setAJR();
        $this->setToxicite();
        $this->calculBilan();
    }

    // function setApports()
    // {
    //     foreach ($this->oligovitamines as $type => $elements) {
    //         foreach ($elements as $element) {
    //             $this->mineral[$element] = ($this->mineral[$element] == '') ? 0 : $this->mineral[$element];
    //             $this->mineral[$element] = ($this->mineral[$element] < 0) ? 0 : $this->mineral[$element];
    //             $this->apports_mineral[$element] = $this->mineral[$element] * $this->quantite / 1000;
    //         }
    //     }
    // }

    function setAJR(): void
    {
        foreach ($this->oligovitamines as $types) {
            foreach($types as $oligovitamine) {
                if (!is_array($this->valeurs[$oligovitamine]['ajr'])) {
                    $this->ajr[$oligovitamine] = $this->valeurs[$oligovitamine]['ajr'];
                } else {
                    foreach ($this->valeurs[$oligovitamine]['ajr'] as $parametre => $norme) {
                        if ($this->stade == $parametre) {
                            $this->ajr[$oligovitamine] = $norme;
                        } elseif ($this->espece == $parametre) {
                            $this->ajr[$oligovitamine] = $norme;
                        }
                    }
                }
            }
        }
    }

    function setToxicite() : void
    {
        foreach ($this->oligovitamines as $types) {
            foreach($types as $oligovitamine) {
                if (!is_array($this->valeurs[$oligovitamine]['toxicite'])) {
                    $this->toxicite[$oligovitamine] = $this->valeurs[$oligovitamine]['toxicite'];
                } else {
                    foreach ($this->valeurs[$oligovitamine]['toxicite'] as $parametre => $norme) {
                        if ($this->stade == $parametre) {
                            $this->toxicite[$oligovitamine] = $norme;
                        } elseif ($this->espece == $parametre) {
                            $this->toxicite[$oligovitamine] = $norme;
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

        foreach ($this->oligovitamines as $oligoOuVitamines) {
            foreach ($oligoOuVitamines as $element) {
                // En l'absence de valeurs du minéral pour un élément, la valeur est mise à 0
                $this->mineral[$element] =
                    ($this->mineral[$element] == null) ? 0 : $this->mineral[$element];
                // Calcul des apports totaux (mineral x qtt) et des besoins totaux (ajr x msi) en ppm ou mg
                $apport_total = $this->mineral[$element] * $this->quantite/1000 + $this->valeurs[$element]['apports_alim'] * $this->msi;
                $this->apports_totaux[$element] = $apport_total;
                $ajr_total = $this->ajr[$element] * $this->msi;
                $this->ajr_totaux[$element] = $ajr_total;
                // Calcul de la toxicité
                $toxicite = $this->toxicite[$element];
                $carence = $this->valeurs[$element]['carence'];

                // Définition des classes à afficher à fonction de l'équilibre/carence/toxicité
                // cf. app.css
                if ($this->atelier == 'aucun' || $this->stade == 'aucun' || $this->msi == 0) {
                    // Si  pas d'atelier et de stade défini, affichage gris
                    $this->bilan[$element] = 'notyetset';
                } else {
                    // Test de la toxicité
                    if ($apport_total >= $toxicite * $this->msi) {
                        // Si toxicité, affichage rouge foncé
                        $this->bilan[$element] = 'toxicite';
                    } else {
                        // Test des niveaux d'apport
                        if ($apport_total >= $ajr_total) {
                            // Si équilibre, affichage vert
                            $this->bilan[$element] = 'equilibre';
                        } elseif ($apport_total < $ajr_total && $apport_total > $this->valeurs[$element]['carence'] * $this->msi) {
                            $this->bilan[$element] = 'subcarence';
                        } else {
                            // Si carence, affichage rouge clair
                            $this->bilan[$element] = 'carence';
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
