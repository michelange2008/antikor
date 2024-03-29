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

    public function parasitisme()
    {
        return view('parasito');
    }

    public function alim()
    {
        return view('alim'); 
    }

    public function reproduction()
    {
        // $reproduction = config('links.reproduction');
        // return redirect()->to($reproduction);

        return view('repro.cycle-ovarien');
    }

    function antikor()
    {
        $datas = $this->litJson("antikor");
        $equipe = config('antikor');
        return view('antikor.antikor-index', [
            'datas' => $datas,
            'equipe' => $equipe,
        ]);
    }

    function avertissement()
    {
        return view('avertissement')   ; 
    }
}
