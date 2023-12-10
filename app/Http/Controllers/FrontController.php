<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;

use App\View\Components\Titre;

use App\Traits\LitJson;

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
        return view('formations.form_show_user', [
            'formation' => $formation,
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
