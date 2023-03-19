<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
