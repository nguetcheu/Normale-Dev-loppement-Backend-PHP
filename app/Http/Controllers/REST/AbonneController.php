<?php

namespace App\Http\Controllers\REST;

use App\Http\Controllers\Controller;
use App\Models\Abonne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $abonne = Abonne::all();
        return response()->json($abonne, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request,
            [
                'nom' => 'required|max:20',
                'prenom' => 'required|max:20',
                'age' => 'required|max:100',
                'sexe' => 'required|max:5',
                'profession' => 'required|max:20',
                'rue' => 'required|max:20',
                'code_postal' => 'required|max:2',
                'ville' => 'required|max:20',
                'pays' => 'required|max:20',
                'telephone' => 'required|max:20',
                'email' => 'required|max:20',
                'id_rubrique' => 'required|max:2',
                'id_motivation' => 'required|max2',
            ]
        );

        try {
            DB::beginTransaction();
            $abonne = Abonne::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'age' => $request->age,
                'sexe' => $request->sexe,
                'profession' => $request->profession,
                'rue' => $request->rue,
                'code_postal' => $request->code_postal,
                'ville' => $request->ville,
                'pays' => $request->pays,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'id_rubrique' => $request->id_rubrique,
                'id_motivation' => $request->id_motivation,
            ]);
            DB::commit();
            return response()->json($abonne, 201);
        } catch (\Throwable $th) {
            return response()->json("{'error: Imposible de sauvegarder'}", 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Abonne $abonne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $abonne = Abonne::find($id);
            $abonne->update($request->all());
            response()->json("{'Modification réussie de abonne'}", 200);
            return $abonne;
        } catch (Throwable $error) {
            return response()->json("{'error: Imposible de mettre a jour abonne'}", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $abonne = Abonne::find($id);
            $abonne->delete();
            return response()->json("{'Suppresion réussie de abonne'}", 200);
        } catch (Throwable $error) {
            return response()->json("{'error: Imposible de supprimé abonne'}", 404);
        }
    }
}
