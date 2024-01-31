<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Winter\LaravelConfigWriter\ArrayFile;

class OligosParametres extends Component
{
    public $ateliers;
    public $stades;
    public $tolerance;
    public $msi;
    public $init = [];

    function mount()
    {
        $this->ateliers = config('oligo.ateliers');
        $this->stades = config('oligo.stades');
        $this->tolerance = config('oligo.tolerance');
        $this->init = config('oligo.init');
        $this->msi = config('oligo.msi');

    }

    function setParametre($parametre)
    {   
        $config = ArrayFile::open(base_path('config/oligo.php'));
        $config->set($parametre, $this->$parametre);
        $config->write();
    }

    public function render()
    {
        return view('livewire.oligos-parametres');
    }
}
