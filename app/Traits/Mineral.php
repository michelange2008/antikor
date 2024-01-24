<?php
namespace App\Traits;

use App\Traits\Oligoelement;
use Illuminate\Support\Collection;

/**
 * Gestion de l'objet minéral qui est un complément alimentaire
 * avec des composants
 */
trait Mineral
{
    use Oligoelement;

    function setOligo(string $name, float $value) : void
    {
        $oligo = $this->set($name, $value);
    }

    function setMineral(float $zincVal = 0,
        float $cuivreVal = 0,
        float $iodeVal = 0,
        float $seleniumVal = 0,
        float $cobaltVal = 0,
        float $manganeseVal = 0,
        float $vitAVal = 0,
        float $vitD3Val = 0,
        float $vitEVal = 0
        ) : Collection 
    {
        $mineral= collect();
        $mineral->zinc = $this->set("zinc", $zincVal);
        $mineral->cuivre = $this->set("cuivre", $cuivreVal);
        $mineral->iode = $this->set("iode", $iodeVal);
        $mineral->selenium = $this->set("sélénium", $seleniumVal);
        $mineral->cobalt = $this->set("cobalt", $cobaltVal);
        $mineral->manganese = $this->set("manganèse", $manganeseVal);
        $mineral->vitA = $this->set("vitamine A", $vitAVal);
        $mineral->vitD3 = $this->set("vitamine D3", $vitD3Val);
        $mineral->vitE = $this->set("vitamine E", $vitEVal);

        return $mineral;
        }
    
}
