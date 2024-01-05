<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;
use App\Models\Formation;
use App\Models\Programmedetail;
use App\Models\Programmesoustitre;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::all();

        return view('formations.form_index', [
            'route' => 'formations.show',
            'formations' => $formations,
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
    public function store(StoreFormationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        $id_formation = $formation->id;
        $next_formation = Formation::find($id_formation + 1);
        $previous_formation = Formation::find($id_formation - 1);
        $programme = DB::table('programmesoustitres')
            ->where('formations.id', $id_formation)
            ->join('formations', 'formations.id', 'programmesoustitres.formation_id')
            ->leftJoin('programmedetails', 'programmesoustitres.id', 'programmedetails.programmesoustitre_id')
            ->select('programmesoustitres.nom as soustitre', 'programmedetails.nom as detail')
            ->orderBy('programmesoustitres.ordre')
            ->get()->groupBy('soustitre');

        return view('formations.form_show_admin', [
            'formation' => $formation,
            'next_formation' => $next_formation,
            'previous_formation' => $previous_formation,
            'programme' => $programme,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormationRequest $request, Formation $formation)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
