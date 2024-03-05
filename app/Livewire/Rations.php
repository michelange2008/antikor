<?php

namespace App\Livewire;

use App\Models\Aliment;
use App\Models\Altype;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Rations extends Component
{
    public Collection $liste_aliments;
    public Collection $altypes;
    public array $ration = [];
    public array $rationTotale = [];
    public int $altypeChoisi = 0;
    public int $alimentChoisi = 0;
    public float $qtt = 0;
    public array $aliment = [];
    public int $editModal = 0;
    public string $link_root;

    function mount()
    {
        $this->liste_aliments = Aliment::all();
        $altypesUsed = Aliment::pluck('altype_id')->unique();
        $this->altypes = Altype::whereIn('id', $altypesUsed)->get();
        $this->calculRationTotale();
        $this->link_root = config('aliments.link_root');
    }

    function updated()
    {
        if ($this->altypeChoisi == 0) {
            $this->liste_aliments = Aliment::all();
        } else {
            $this->liste_aliments = Aliment::where('altype_id', $this->altypeChoisi)->get();
        }
    }

    function addAlimentToRation()
    {
        $this->ration[$this->alimentChoisi] = $this->calculAliment(
            Aliment::find($this->alimentChoisi),
            $this->qtt
        );
        $this->calculRationTotale();
        $this->maj();
    }

    function delAliment($id)
    {
        unset($this->ration[$id]);
        $this->maj();
    }

    function delAliments()
    {
        $this->ration = [];
        $this->maj();
    }

    function maj()
    {
        $this->altypeChoisi = 0;
        $this->alimentChoisi = 0;
        $this->qtt = 0;
        $this->liste_aliments = Aliment::all();
        $this->calculRationTotale();
        $this->aliment = [];
    }

    function calculAliment(Aliment $aliment, float $qtt): array
    {
        if ($aliment->altype != null) {
            $alstade = ($aliment->alstade == null) ? '' : ' - ' . $aliment->alstade->nom;
            $nom = $aliment->nom . $alstade . ' (' . $aliment->altype->nom . ')';
        } else {
            $nom = $aliment->nom;
        }
        $alimentIngere = [
            "nom" => $nom,
            "qtt" => $this->arrondi($qtt),
            "qttMS" => $this->arrondi($qtt * $aliment->MS / 100),
            "P" => $this->arrondi($qtt * ($aliment->MS / 100) * $aliment->P),
            "Ca" => $this->arrondi($qtt * ($aliment->MS / 100) * $aliment->Ca),
            "link" => $aliment->link,
        ];

        return $alimentIngere;
    }

    function calculRationTotale()
    {
        $qtt = 0;
        $qttMS = 0;
        $P = 0;
        $Ca = 0;
        if (count($this->ration) > 0) {
            foreach ($this->ration as $aliment) {
                $qtt += $aliment['qtt'];
                $qttMS += $aliment['qttMS'];
                $P += $aliment['P'];
                $Ca += $aliment['Ca'];
            }
        }

        $this->rationTotale = [
            "nom" => "Total",
            "qtt" => $this->arrondi($qtt),
            "qttMS" => $this->arrondi($qttMS),
            "P" => $this->arrondi($P),
            "Ca" => $this->arrondi($Ca),
        ];
        $this->dispatch('nouvelle_ration', apports: [
            'P' => $this->rationTotale['P'],
            'Ca' => $this->rationTotale['Ca'],
        ]);
    }

    public function arrondi(float $valeur) : float {
        
        if ($valeur < 0.01) {
            return round($valeur, 3);
        
        } elseif ($valeur < 0.1) {
            return round($valeur, 2);
        } else {
            return round($valeur, 1);
        }
    }

    function editAliment($aliment_id, $nom, $qtt)
    {
        $this->editModal = $aliment_id;
        $aliment_editable = Aliment::find($aliment_id);
        $this->aliment['id'] = $aliment_editable->id;
        $this->aliment['nom'] = $nom;
        $this->aliment['qtt'] = $qtt;
        $this->aliment['MS'] = $aliment_editable->MS;
        $this->aliment['Ptot'] = $aliment_editable->Ptot;       
        $this->aliment['P'] = $aliment_editable->P;       
        $this->aliment['Catot'] = $aliment_editable->Catot;       
        $this->aliment['Ca'] = $aliment_editable->Ca;       
    }

    function storeAliment()
    {
        $this->editModal = 0;   
        $alimentIngere = [
            "nom" => $this->aliment['nom'],
            "qtt" => $this->arrondi($this->aliment['qtt']),
            "qttMS" => $this->arrondi($this->aliment['qtt'] * $this->aliment['MS'] / 100),
            "P" => $this->arrondi($this->aliment['qtt'] * ($this->aliment['MS'] / 100) * $this->aliment['P']),
            "Ca" => $this->arrondi($this->aliment['qtt'] * ($this->aliment['MS'] / 100) * $this->aliment['Ca']),
        ];
        $this->ration[$this->aliment['id']] = $alimentIngere;
        $this->maj();
    }
    public function render()
    {
        return view('livewire.rations');
    }
}
