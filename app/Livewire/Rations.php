<?php

namespace App\Livewire;

use App\Models\Aliment;
use App\Models\Altype;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Rations extends Component
{
    public Collection $liste_aliments;
    public Collection $altypes;
    public array $ration = [];
    public array $rationTotale = [];
    public int $altypeChoisi = 0;
    public int $alimentChoisi = 0;
    public float $qtt = 0;

    function mount()
    {
        $this->liste_aliments = Aliment::all();
        $altypesUsed = Aliment::pluck('altype_id')->unique();
        $this->altypes = Altype::whereIn('id', $altypesUsed)->get();
        $this->calculRationTotale();
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
    }

    function calculAliment(Aliment $aliment, float $qtt): array
    {
        $alstade = ($aliment->alstade == null) ? '' : ' - ' . $aliment->alstade->nom;
        $alimentIngere = [
            "nom" => $aliment->nom . $alstade . ' (' . $aliment->altype->nom . ')',
            "qtt" => round($qtt, 1),
            "qttMS" => round($qtt * $aliment->MS / 100, 1),
            "P" => round($qtt * ($aliment->MS / 100) * $aliment->P, 1),
            "Ca" => round($qtt * ($aliment->MS / 100) * $aliment->Ca, 1),
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
            "qtt" => $qtt,
            "qttMS" => $qttMS,
            "P" => $P,
            "Ca" => $Ca,
        ];
        $this->dispatch('nouvelle_ration', apports: [
            'P' => $this->rationTotale['P'],
            'Ca' => $this->rationTotale['Ca'],
        ]);
    }
    public function render()
    {
        return view('livewire.rations');
    }
}
