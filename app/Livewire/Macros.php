<?php

namespace App\Livewire;

use Livewire\Component;

class Macros extends Component
{
    public $troupeau = [];
    public $ateliers = [];
    public $stades = [];
    public $defaults = [];
    public $choixTroupeau = [];
    public $msi;
    public $besoins;

    function mount()
    {
        $this->defaults = config('macros.default');
        $this->troupeau = config('macros.troupeau');
        $this->ateliers = config('macros.ateliers');
        $this->stades = config('macros.stades');
        $this->besoins = config('macros.besoins');
        $this->msi = config('macros.msi');
        $this->setDefaults();
        $this->calculBesoins();
    }

    function updated()
    {
        $this->calculBesoins();
    }

    function setDefaults()
    {
        $this->troupeau['parametres'] = $this->defaults[$this->troupeau['atelier']];
    }

    function choixAtelier($atelier)
    {
        $this->troupeau['atelier'] = $atelier;
        $this->troupeau['production'] = $this->ateliers[$atelier]['production'];
        $this->setDefaults();
        $this->calculBesoins();
    }

    function setStade($stade)
    {
        $this->troupeau['stade'] = $stade;
        $this->calculBesoins();
    }

    function choixStade($stade)
    {
        $this->troupeau['stade'] = $stade;
    }

    function calculBesoins()
    {
        $this->troupeau['parametres']['quantite'] = ($this->troupeau['parametres']['quantite'] == null) ? 0 : $this->troupeau['parametres']['quantite'];
        $this->troupeau['parametres']['poids'] = ($this->troupeau['parametres']['poids'] == null) ? 65 : $this->troupeau['parametres']['poids'];
        $this->troupeau['parametres']['prolificite'] = ($this->troupeau['parametres']['prolificite'] == null) ? 1 : $this->troupeau['parametres']['prolificite'];
        $pv = $this->troupeau['parametres']['poids'];
        $msi = $this->msi;
        $prolificite = $this->troupeau['parametres']['prolificite'];
        $atelier = $this->troupeau['atelier'];
        $stade = $this->troupeau['stade'];

        $p_entretien = 0.905 * $msi + 0.3 + 0.002 * $pv;
        $ca_entretien['gestation'] = 0.015 * $pv;
        $ca_entretien['lactation'] = 0.663 * $msi + 0.01 * $pv;
        $mg_entretien = 0.01 * $pv;

        $p_production['cp']['gestation'] = 0.6 * $prolificite;
        $p_production['oa']['gestation'] = 0.4 * $prolificite;
        $p_production['ol']['gestation'] = 0.4 * $prolificite;

        $ca_production['cp']['gestation'] = $prolificite;
        $ca_production['oa']['gestation'] = 0.7 * $prolificite;
        $ca_production['ol']['gestation'] = 0.7 * $prolificite;

        $p_production['cp']['lactation'] = $p_entretien + 0.95 * $this->troupeau['parametres']['quantite'];
        $p_production['oa']['lactation'] = $p_entretien + 1.5 * $this->troupeau['parametres']['quantite'];
        $p_production['ol']['lactation'] = $p_entretien + 1.5 * $this->troupeau['parametres']['quantite'];

        $ca_production['cp']['lactation'] = $ca_entretien['lactation'] + 1.25 * $this->troupeau['parametres']['quantite'];
        $ca_production['oa']['lactation'] = $ca_entretien['lactation'] + 1.90 * $this->troupeau['parametres']['quantite'];
        $ca_production['ol']['lactation'] = $ca_entretien['lactation'] + 1.90 * $this->troupeau['parametres']['quantite'];

        $this->besoins['p'] = round($p_production[$atelier][$stade], 1);
        $this->besoins['ca'] = round($ca_production[$atelier][$stade], 1);
    }
    public function render()
    {
        return view('livewire.macros');
    }
}
