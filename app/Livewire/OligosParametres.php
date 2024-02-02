<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Winter\LaravelConfigWriter\ArrayFile;

class OligosParametres extends Component
{
    public $oligovitamines;
    public $besoins;
    public $toxicites;
    public $especes;
    public $ateliers;
    public $stades;
    public $tolerance;
    public $msi;
    public $nouvelElement = [];
    public $init = [];

    function mount()
    {
        $this->oligovitamines = config('oligo.oligovitamines');
        $this->besoins = config('oligo.besoins');
        $this->toxicites = config('oligo.toxicites');
        $this->especes = config('oligo.especes');
        $this->ateliers = config('oligo.ateliers');
        $this->stades = config('oligo.stades');
        $this->tolerance = config('oligo.tolerance');
        $this->init = config('oligo.init');
        $this->msi = config('oligo.msi');
        $this->nouvelElement['vitamines']['abbreviation'] = "";
        $this->nouvelElement['oligoelements']['nom'] = "";

    }

    function setParametre($parametre)
    {   
        $config = ArrayFile::open(base_path('config/oligo.php'));
        $config->set($parametre, $this->$parametre);
        $config->write();
    }

    function addElement($type)
    {
        $abbreviation = strtolower($this->nouvelElement[$type]['abbreviation']);
        $nom = strtolower($this->nouvelElement[$type]['nom']);
        $this->oligovitamines[$type][$abbreviation] = $nom;
        $config = ArrayFile::open(base_path('config/oligo.php'));
        $config->set('oligovitamines', $this->oligovitamines);
        $config->write();
    }

    public function render()
    {
        return view('livewire.oligos-parametres');
    }
}
