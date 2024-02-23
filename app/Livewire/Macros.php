<?php

namespace App\Livewire;

use Livewire\Component;

class Macros extends Component
{
    public $troupeau = [];
    public $ateliers = [];
    public $stades = [];
    public $choixTroupeau =[];
    public $msi;
    public $besoins;

    function mount()
    {
        $this->troupeau = config('macros.troupeau');   
        $this->ateliers = config('macros.ateliers'); 
        $this->stades = config('macros.stades');
        $this->besoins = config('macros.besoins');
        $this->msi = config('macros.msi');
        $this->calculBesoins();
    }

    function choixAtelier($atelier)
    {
        $this->troupeau['atelier'] = $atelier;
        $this->troupeau['production'] = $this->ateliers[$atelier]['production'];
        $this->calculBesoins();
    }

    function choixStade($stade)
    {
        $this->troupeau['stade'] = $stade;    
    }

    function calculBesoins()
    {
        $pv = $this->troupeau['poids'];
        $msi = $this->msi;
        $prolificite = 1.5;
        $atelier = $this->troupeau['atelier'];
        $stade = $this->troupeau['stade'];

        $p_entretien = 0.905 * $msi + 0.3 + 0.002 * $pv;
        $ca_entretien['gestation'] = 0.015 * $pv;
        $ca_entretien['lactation'] = 0.67 * $msi + 0.01 * $pv;
        $mg_entretien = 0.01 * $pv;

        $p_production['cp']['gestation'] = 0.6 * $prolificite; 
        $p_production['oa']['gestation'] = 0.4 * $prolificite; 
        $p_production['ol']['gestation'] = 0.4 * $prolificite; 

        $ca_production['cp']['gestation'] = $prolificite; 
        $ca_production['oa']['gestation'] = 0.7 * $prolificite; 
        $ca_production['ol']['gestation'] = 0.7 * $prolificite; 

        $p_production['cp']['lactation'] = $p_entretien + 0.95 * $this->troupeau['quantite'];
        $p_production['oa']['lactation'] = $p_entretien + 1.5 * $this->troupeau['quantite'];
        $p_production['ol']['lactation'] = $p_entretien + 1.5 * $this->troupeau['quantite'];

        $ca_production['cp']['lactation'] = $ca_entretien['lactation'] + 1.25 * $this->troupeau['quantite'];
        $ca_production['oa']['lactation'] = $ca_entretien['lactation'] + 1.90 * $this->troupeau['quantite'];
        $ca_production['ol']['lactation'] = $ca_entretien['lactation'] + 1.90 * $this->troupeau['quantite'];

        $this->besoins['p'] = $p_production[$atelier][$stade];
        $this->besoins['ca'] = $ca_production[$atelier][$stade];
    }
    public function render()
    {
        return view('livewire.macros');
    }
}
