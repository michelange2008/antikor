<?php

namespace App\Http\Controllers;

use App\Models\Phytoprep;
use App\Models\Phytoproduit;
use App\Models\Phytotype;
use Illuminate\Http\Request;

class PhytoprepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('preparations.preparations', [
            'preparations' => Phytoprep::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Phytoprep $phytoprep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phytoprep $preparation)
    {
        $produits = Phytoproduit::all()->sortBy('name');
        $types = Phytotype::all();

        return view('preparations.composition-edit', [
            'preparation' => $preparation,
            'produits' => $produits,
            'types' => $types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phytoprep $preparation)
    {
        
        $datas = array_slice($request->all(), 2);

        $update = [];

        foreach ($datas as $Q_produit_id => $quantite) {
            $produit_id = substr($Q_produit_id, 2);
            if ($quantite > 0) {
                $update[$produit_id] = [ 'quantite' => $quantite];
            }
        }
        $result = $preparation->produits()->sync($update);

        if (empty($result['attached']) && empty($result['detached']) && empty($result['updated'])) {

            return back()->with(["message" => "La préparation n'a pas été modifiée"]);

        } else {

            return back()->with(["message" => "La composition de la préparation a été mise à jour", 'type' => "warning"]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phytoprep $phytoprep)
    {
        //
    }
}
