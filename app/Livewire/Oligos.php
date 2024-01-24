<?php
namespace App\Livewire;

use Livewire\Component;
use App\Traits\Mineral;

class Oligos extends Component
{

    use Mineral;

    public $mineral;
    public $espece = 'oa';
    public $stade = '';

    function mount()
    {
        $this->mineral = $this->setMineral(100);
    }
    function toggle($parametre, $valeur)
    {
        $this->$parametre = ($this->$parametre == $valeur) ? '' : $valeur;    
    }

    function setStade($stade)
    {
        $this->stade = ($this->stade == $stade) ? '' : $stade;    
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
