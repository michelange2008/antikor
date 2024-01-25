<?php

namespace App\Livewire;

use App\Models\Mineral;
use Livewire\Component;
use App\Traits\MineralManager;
use Symfony\Component\ErrorHandler\Error\ClassNotFoundError;

class Oligos extends Component
{

    use MineralManager;

    public $mineral;
    public $espece;
    public $stade;
    public int $quantite = 10;
    public $listeOligos;
    public $besoins;
    public $msi;

    public const MSICPGE = 2;
    public const MSICPLA = 3;
    public const MSIOAGE = 2;
    public const MSIOALA = 3;
    public const MSIOLGE = 2;
    public const MSIOLLA = 3;
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
        $this->msi = self::MSICPGE;
        $this->listeOligos = $this->getListeOligos();
        $this->besoins = $this->getBesoinsCp();
        $this->mineral = $this->besoins();

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
            $this->msi = ($this->stade == 'ge') ? self::MSICPGE : self::MSICPLA ;
        } elseif ($this->espece == 'oa') {
            $this->msi = ($this->stade == 'ge') ? self::MSIOAGE : self::MSIOALA ;
        } elseif ($this->espece == 'ol') {
            $this->msi = ($this->stade == 'ge') ? self::MSIOLGE : self::MSIOLLA ;
        } else {
            $this->msi = 0;
        }
    }

    function maj($oligo) : void {
        $this->mineral->put($oligo, $this->$oligo);
    }

    function majQtt()
    {
    }

    function raz()
    {
        $this->espece = '';
        $this->stade = '';
    }
    public function render()
    {
        return view('livewire.oligos');
    }
}
