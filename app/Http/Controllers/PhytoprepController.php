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
        $produits = Phytoproduit::all();
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
    public function update(Request $request, Phytoprep $phytoprep)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phytoprep $phytoprep)
    {
        //
    }
}
