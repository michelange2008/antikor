<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
/**
 * Gère la page d'accueil après la connexion de l'utilisateur
 */
class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('home', [
            'users' => $users,
        ]);
    }

    public function aroma()
    {
        return view('aroma');
    }

    public function visites()
    {
        return "coucou";
    }
}
