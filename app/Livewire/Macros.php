<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Macros extends Component
{
    public array $troupeau = [];
    public array $ateliers = [];
    public array $stades = [];
    public array $defaults = [];
    public array $choixTroupeau = [];
    public float $msi;
    public array $besoins;
    public array $apports;
    public string $bilan = '';
    public bool $bilanOk = false;
    public array $ration = [];

    function mount()
    {
        $this->defaults = config('macros.default');
        $this->troupeau = config('macros.troupeau');
        $this->ateliers = config('macros.ateliers');
        $this->stades = config('macros.stades');
        $this->besoins = config('macros.besoins_initiaux');
        $this->msi = config('macros.msi');
        $this->setDefaults();
        $this->apports = config('macros.apports_initiaux');
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

        $mg_entretien = 0.01 * $pv;
        $coeff_ca_bovins = 13.0415;

        $p_production['cp']['gestation'] = 0.905 * $msi + 0.3 + 0.002 * $pv + 0.6 * $prolificite;
        $p_production['oa']['gestation'] = 0.905 * $msi + 0.3 + 0.002 * $pv + 0.4 * $prolificite;
        $p_production['ol']['gestation'] = 0.905 * $msi + 0.3 + 0.002 * $pv + 0.4 * $prolificite;
        $p_production['vl']['gestation'] = 0.05 * $pv -15.5 + 5.3;
        $p_production['va']['gestation'] = 0.05 * $pv -15.5 + 5.3;

        $ca_production['cp']['gestation'] = 0.015 * $pv + $prolificite;
        $ca_production['oa']['gestation'] = 0.015 * $pv + 0.7 * $prolificite;
        $ca_production['ol']['gestation'] = 0.015 * $pv + 0.7 * $prolificite;
        $ca_production['vl']['gestation'] = 0.0475 * $pv - $coeff_ca_bovins + 9;
        $ca_production['va']['gestation'] = 0.0475 * $pv - $coeff_ca_bovins + 9;

        $p_production['cp']['lactation'] = 0.905 * $msi + 0.3 + 0.002 * $pv + 0.95 * $this->troupeau['parametres']['quantite'];
        $p_production['oa']['lactation'] = 0.905 * $msi + 0.3 + 0.002 * $pv + 1.5 * $this->troupeau['parametres']['quantite'];
        $p_production['ol']['lactation'] = 0.905 * $msi + 0.3 + 0.002 * $pv + 1.5 * $this->troupeau['parametres']['quantite'];
        $p_production['vl']['lactation'] = 0.05 * $pv -15.5 + 0.9 * $this->troupeau['parametres']['quantite'];
        $p_production['va']['lactation'] = 0.05 * $pv -15.5 + 0.9 * $this->troupeau['parametres']['quantite'];

        $ca_production['cp']['lactation'] = 0.663 * $msi + 0.01 * $pv + 1.25 * $this->troupeau['parametres']['quantite'];
        $ca_production['oa']['lactation'] = 0.663 * $msi + 0.01 * $pv + 1.90 * $this->troupeau['parametres']['quantite'];
        $ca_production['ol']['lactation'] = 0.663 * $msi + 0.01 * $pv + 1.90 * $this->troupeau['parametres']['quantite'];
        $ca_production['vl']['lactation'] = 0.0475 * $pv - $coeff_ca_bovins+ 1.25 * $this->troupeau['parametres']['quantite'];
        $ca_production['va']['lactation'] = 0.0475 * $pv - $coeff_ca_bovins+ 1.25 * $this->troupeau['parametres']['quantite'];

        $this->besoins['P'] = round($p_production[$atelier][$stade], 1);
        $this->besoins['Ca'] = round($ca_production[$atelier][$stade], 1);
        $this->besoins['Mg'] = $mg_entretien;

        $this->correction();
    }

    #[On('nouvelle_ration')]
    function nouvelleRation($apports)
    {
        $this->apports = $apports;
        $this->correction();
    }

    public function correction()
    {
        $bilanP = $this->apports['P'] - $this->besoins['P'];
        $bilanCa = $this->apports['Ca'] - $this->besoins['Ca'];
        $this->bilanOk = false;

        if ($bilanP < 0 && $bilanCa < 0) {
            $this->bilan = "Il manque " . abs($bilanP) . " g de Phosphore absorbable et " . abs($bilanCa) . 
            " g de Calcium absorbable (rapport Ca/P = " . round($bilanCa / $bilanP, 1) . ")";
        } elseif ($bilanP < 0 && $bilanCa >= 0) {
            $this->bilan = "Il manque " . abs($bilanP) . " g de Phosphore absorbable.";
        } elseif ($bilanP >= 0 && $bilanCa < 0) {
            $this->bilan = "Il manque " . abs($bilanCa) . " g de Calcium absorbable.";
        } else {
            $this->bilan = "Les apports sont suffisants";
            $this->bilanOk = true;
        }

        $this->dispatch('nouveau_bilan', [
            'P' => $bilanP,
            'Ca' => $bilanCa,
        ]);
    }
    public function render()
    {
        return view('livewire.macros');
    }
}
