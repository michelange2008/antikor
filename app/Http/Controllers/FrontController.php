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
            'formations' => $formations,
        ]);

    }

    public function parasitisme()
    {
        "coucou";
    }

    public function reproduction()
    {
        # code...
    }
}
