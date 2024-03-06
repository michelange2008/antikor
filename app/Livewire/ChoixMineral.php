<?php

namespace App\Livewire;

use App\Models\Aliment;
use App\Models\Altype;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class ChoixMineral extends Component
{
    public $bilan = [];
    public $car = [];
    public $besoinsSupp = [];
    public $liste_mineraux = [];
    #[Validate('required|string', as: "nom")]
    public string $nomNouveau;
    #[Validate('required|numeric', as: "phosphore total")]
    public float $PtotNouveau;
    #[Validate('required|numeric', as: "calcium total")]
    public float $CatotNouveau;
    public string $link_root;

    public function mount()
    {
        $this->besoinsSupp = config('macros.besoins_initiaux');
        $this->car = config('macros.car');
        $this->chercheMineral();
        $this->link_root = config('aliments.link_root');
    }

    #[On('nouveau_bilan')]
    public function BesoinsSupp($bilan)
    {
        $this->besoinsSupp['P'] = ($bilan['P'] < 0 ) ? abs($bilan['P']) : 0;
        $this->besoinsSupp['Ca'] = ($bilan['Ca'] < 0) ? abs($bilan['Ca']) : 0;  
        $this->besoinsSupp['CaP'] = ($this->besoinsSupp['P'] != 0)? $this->besoinsSupp['Ca'] / $this->besoinsSupp['P'] : 0;  
        $this->chercheMineral();
    }
    /**
     * Cherche le minéral le plus proche en Ca/P des besoins et calcul la quantité sur la base du P
     *
     * @return void
     */
    public function chercheMineral()
    {
        $this->liste_mineraux = [];
        $mineral_id = Altype::where('nom', 'minéral')->first();
        $mineraux = Aliment::where('altype_id', $mineral_id->id)->get();   
        // Ajoute à la liste_mineraux la différence entre le rapport Ca/P à amener et celui de chaque minéral
        foreach ($mineraux as $mineral) {
            $this->liste_mineraux[] = $this->peupleMineral($mineral->nom, $mineral->P, $mineral->Ca, $mineral->link, false);
        }

    }

    /**
     * peuple chaque ligne du tableau ligne_mineraux en effectuant les calculs nécessaires
     *
     * Undocumented function long description
     *
     * @param Array $mineral
     * @return void
     **/
    public function peupleMineral(string $nom, float $P, float $Ca, $link, bool $nouveau)
    {
        // Ajout des informations initiales
        $mineral['nom'] = $nom;
        $mineral['link'] = $link;
        $mineral['P'] = $P;
        $mineral['Ca'] = $Ca;
        // Calcul du rapport Ca/P pour comparaison entre les besoins et les minéraux dispo
        $mineral['CaP'] = ( $P != 0 ) ? $Ca / $P : 0;
        // Evaluation du besoin en minéral selon les besoins en P ou en Ca
        $qttSelonP = ($mineral['P'] == 0 ) ? null : $this->besoinsSupp['P'] / $mineral['P'];
        $qttSelonCa = ($mineral['Ca'] == 0 ) ? null : $this->besoinsSupp['Ca'] / $mineral['Ca'];
        $qtt = max($qttSelonCa, $qttSelonP);
        $mineral['qtt'] = $qtt;
        // Calcul des apports correspondants
        $mineral['apportsP'] = $qtt * $mineral['P'];
        $mineral['apportsCa'] = $qtt * $mineral['Ca'];
        // Calcul de la couverture des besoins en P
        if ($this->besoinsSupp['P'] !=  0) {
            $couvBesoinsP = round(100 * (1 - ($this->besoinsSupp['P'] - $qtt * $mineral['P']) / $this->besoinsSupp['P']), 0);
        } else {
            $couvBesoinsP = '-';
        }
        $mineral['couvBesoinsP'] = $couvBesoinsP;
        // Idem pour le calcium
        if ($this->besoinsSupp['Ca'] !=  0) {
            $couvBesoinsCa = round(100 * (1 - ($this->besoinsSupp['Ca'] - $qtt * $mineral['Ca']) / $this->besoinsSupp['Ca']), 0);
        } else {
            $couvBesoinsCa = '> 100';
        }
        $mineral['couvBesoinsCa'] = $couvBesoinsCa;
        // Un minéral qui ne couvre pas les besoins en P ou Ca n'a pas d'intérêt (0 affichage)
        $mineral['bon'] = ( $couvBesoinsP == 0 || $couvBesoinsCa == 0 ) ? false : true;
        // Si c'est le minéral ajouté par l'utilisateur, il est forcément à afficher
        $mineral['bon'] = ( $nouveau ) ? true : $mineral['bon'];
        // Permet de reconnaître le minéral personnel ajouté
        $mineral['nouveau'] = $nouveau;
        return $mineral;
}

    /**
     * Ajoute un nouveau minéral à la liste
     *
     **/
    public function create()
    {
        $this->validate();
        $PNouveau = $this->PtotNouveau * $this->car['P'];
        $CaNouveau = $this->CatotNouveau * $this->car['Ca'];
        $mineralNouveau = $this->peupleMineral($this->nomNouveau, $PNouveau, $CaNouveau, null, true);
        $this->liste_mineraux[] = $mineralNouveau;
        $this->nomNouveau = '';
        $this->PtotNouveau = 0;
        $this->CatotNouveau = 0;

    }

    /**
     * Suppression d'un minéral personnel ajouté
     *
     * @param int id du minéral
     * @return void
     **/
    public function destroy($mineral_id)
    {
        unset($this->liste_mineraux[$mineral_id]);
    }

    public function render()
    {
        return view('livewire.choix-mineral');
    }

}
