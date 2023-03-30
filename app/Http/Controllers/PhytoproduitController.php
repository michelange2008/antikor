<?php

namespace App\Http\Controllers;

use App\Models\Phytoproduit;
use App\Models\Phytotype;
use Illuminate\Http\Request;

class PhytoproduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Phytoproduit::all();
        $phytotypes = Phytotype::all();

        return view('produits.index', [
            'produits' => $produits,
            'phytotypes' => $phytotypes,
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
    public function show(Phytoproduit $phytoproduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phytoproduit $phytoproduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phytoproduit $phytoproduit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phytoproduit $phytoproduit)
    {
        //
    }
}
