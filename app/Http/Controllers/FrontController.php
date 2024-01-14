<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;

use App\View\Components\Titre;

use App\Traits\LitJson;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    use LitJson;

    public function index()
    {
        $datas = $this->litJson("welcome");

        return view('welcome', [
            'datas' => $datas,
        ]);
    }

    public function formations()
    {
        $formations = Formation::all();
        
        return view('front.formations', [
            'route' => 'front.formationShow',
            'formations' => $formations,
        ]);

    }

    /**
     * Détail des formations pour visiteur non connecté
     *
     * @param Formation $formation
     * @return view
     **/
    public function formationShow(Formation $formation)
    {
        $id_formation = $formation->id;
        $nextFormation = Formation::find($id_formation + 1);
        $previousFormation = Formation::find($id_formation - 1);
        $programme = DB::table('programmesoustitres')
            ->where('formations.id', $id_formation)
            ->join('formations', 'formations.id', 'programmesoustitres.formation_id')
            ->leftJoin('programmedetails', 'programmesoustitres.id', 'programmedetails.programmesoustitre_id')
            ->select('programmesoustitres.nom as soustitre', 'programmedetails.nom as detail')
            ->orderBy('programmesoustitres.ordre')
            ->get()->groupBy('soustitre');

        return view('formations.form_show_guest', [
            'formation' => $formation,
            'nextFormation' => $nextFormation,
            'previousFormation' => $previousFormation,
            'programme' => $programme,
        ]);
    }

    public function parasitisme()
    {
        "coucou";
    }

    public function reproduction()
    {
        $reproduction = config('links.reproduction');
        return redirect()->to($reproduction);
    }
}
