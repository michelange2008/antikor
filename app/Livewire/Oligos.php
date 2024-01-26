<?php

namespace App\Livewire;

use Livewire\Component;
use App\Traits\MineralManager;

class Oligos extends Component
{

    use MineralManager;

    public $nombre = 0;
    public $mineral;
    public $espece;
    public $stade;
    public int $quantite = 10;
    public $listeOligos;
    public $besoins;
    public $msi;
    public $bilan;

    public $msiCpGe = 2;
    public $msiCpLa = 3;
    public $msiOaGe = 2;
    public $msiOaLa = 3;
    public $msiOlGe = 2;
    public $msiOlLa = 3;
    public $toxiciteCuivre = 12;
    public $tolerance = 0.2;

    public $zinc;
    public $cuivre;
    public $iode;
    public $selenium;
    public $cobalt;
    public $manganese;
    public $vitA;
    public $vitD3;
    public $vitE;

    function mount()
    {
        $this->espece = 'cp';
        $this->stade = 'ge';
        $this->msi = $this->msiCpGe;
        $this->listeOligos = $this->getListeOligos();
        $this->besoins = $this->getBesoinsCp();
        $this->mineral = $this->setMineral();
        $this->bilan = $this->setMineral();

    }
    function toggle($parametre, $valeur)
    {
        $this->$parametre = $valeur;
        if ($parametre == 'espece') {
            $this->setBesoins($valeur);
        } elseif ($parametre == 'stade') {
            $this->stade = $valeur;
        } else {
            # code...
        }
        $this->setMSI();
        $this->calculBilan();
    }

    function setBesoins($espece): void
    {

        switch ($espece) {
            case 'cp':
                $this->besoins = $this->getBesoinsCp();
                break;

            case 'oa':
                $this->besoins = $this->getBesoinsOa();
                break;

            case 'ol':
                $this->besoins = $this->getBesoinsOl();
                break;

            default:
                
                break;
        }
   }

    function setMSI() : void 
    {
        if ($this->espece == 'cp') {
            $this->msi = ($this->stade == 'ge') ? $this->msiCpGe : $this->msiCpLa ;
        } elseif ($this->espece == 'oa') {
            $this->msi = ($this->stade == 'ge') ? $this->msiOaGe : $this->msiOaLa ;
        } elseif ($this->espece == 'ol') {
            $this->msi = ($this->stade == 'ge') ? $this->msiOlGe : $this->msiOlLa ;
        } else {
            $this->msi = 0;
        }
    }

    function calculBilan() : void {
        foreach ($this->listeOligos as $oligo => $oligoelement) {
            $apport = $this->mineral[$oligo] * $this->quantite / 1000;
            $besoin = $this->besoins[$oligo] * $this->msi;

            if (($this->espece == 'oa' || $this->espece == 'ol') && $oligo == 'cuivre') {
                if ($apport / $this->msi > $this->toxiciteCuivre) {
                    $this->bilan[$oligo] = 'death';
                } elseif ( $apport < ((1 - $this->tolerance) * $besoin) ) {
                    $this->bilan[$oligo] = 'danger';
                } else {
                    $this->bilan[$oligo] = 'success';
                }
            }
            else {
                if ( $apport > ( (1 + $this->tolerance) * $besoin) ) {
                    $this->bilan[$oligo] = 'warning';
                } elseif ( $apport < ( (1 - $this->tolerance) * $besoin) ) {
                    $this->bilan[$oligo] = 'danger';
                } else {
                    $this->bilan[$oligo] = 'success';
                }
            }
        }
    }

    function maj($oligo) : void {
        $this->mineral->put($oligo, $this->$oligo);
        $this->calculBilan();
    }

    function majQtt()
    {
        $this->calculBilan();
    }

    function raz()
    {
        $this->espece = '';
        $this->stade = '';
    }

    function essai()
     {
        $this->nombre = ($this->nombre == 0) ? 1 : 0;   
    }
    public function render()
    {
        return view('livewire.oligos');
    }
}
