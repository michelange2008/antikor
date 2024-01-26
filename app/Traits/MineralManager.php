<?php

namespace App\Traits;

use Illuminate\Support\Collection;

/**
 * Gestion de l'objet minéral qui est un complément alimentaire
 * avec des composants
 */
trait MineralManager
{
    function setOligo(string $name, float $value): void
    {
        $oligo = $this->set($name, $value);
    }

    function setMineral(float $zinc = 0, float $cuivre = 0, 
        float $iode = 0, float $selenium = 0, float $cobalt = 0, float $manganese = 0, 
        float $vitA = 0, float $vitD3 = 0, float $vitE = 0): Collection
    {
        $mineral = collect();
        $mineral->put('zinc', $zinc);
        $mineral->put('cuivre',  $cuivre);
        $mineral->put('iode' , $iode);
        $mineral->put('selenium', $selenium);
        $mineral->put('cobalt', $cobalt);
        $mineral->put('manganese', $manganese);
        $mineral->put('vitA', $vitA);
        $mineral->put('vitD3', $vitD3);
        $mineral->put('vitE', $vitE);
        return $mineral;
    }

    function getBesoinsCp(): Collection
    {
        return $this->setMineral(50, 15, 0.7, 0.15, 0.2, 50, 0, 0, 0 );
    }

    function getBesoinsOa(): Collection
    {
        return $this->setMineral(50, 10, 0.7, 0.15, 0.2, 50, 0, 0, 0 );
    }

    function getBesoinsOl(): Collection
    {
        return $this->setMineral(50, 10, 0.7, 0.15, 0.2, 50, 0, 0, 0 );
    }

    function getListeOligos(): Collection
    {
        $liste = collect([
            'zinc' => "zinc",
            'cuivre' => "cuivre",
            'iode' => "iode",
            'selenium' => "sélénium",
            'cobalt' => "cobalt",
            'manganese' => "manganèse",
            'vitA' => "vitamine A",
            'vitD3' => "vitamine D3",
            'vitE' => "vitamine E",
        ]);


        return $liste;
    }
}
