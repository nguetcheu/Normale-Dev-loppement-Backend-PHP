<?php

namespace App\Http\Controllers;

use App\Models\Abonne;
use App\Models\Newsletter;
use App\Models\Rubrique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class Motivation extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $abonne = Abonne::all();

        return view('liste_abonne', compact('abonne'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $rubrique = Rubrique::all();
        return view('formulaire_abonne', compact('rubrique'));

        $news = Newsletter::all();
        return view('formulaire_abonne', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nom' => 'required|max:20',
            'prenom' => 'required|max:20',
            'age' => 'required|max:20',
            'sexe' => 'required|max:5',
            'profession' => 'required|max:2',
            'rue' => 'required|max:20',
            'code_postal' => 'required|max:20',
            'ville' => 'required|max:20',
            'pays' => 'required|max:20',
            'telephone' => 'required|max:20',
            'email' => 'required|max:20',
            'id_table_rubrique' => 'required|max:20',
            'id_motivation' => 'required|max:20',

        ]);

        $abonne = Abonne::create($validatedData);

        return redirect('liste_abonne')->with('success', 'Abonne crée avec succèss');
    }

    /**
     * Display the specified resource.
     */
    public function show(Abonne $abonne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {
            DB::beginTransaction();
            $abonne = Abonne::find($id);
            DB::commit();
            return view('/update_abonne', compact("abonne"));
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id = '')
    {
        //
        try {
            DB::beginTransaction();
            $abonne = Abonne::find($id);
            $abonne->nom = $request->input('nom');
            $abonne->prenom = $request->input('prenom');
            $abonne->age = $request->input('age');
            $abonne->sexe = $request->input('sexe');
            $abonne->profession = $request->input('profession');
            $abonne->rue = $request->input('rue');
            $abonne->code_postal = $request->input('code_postal');
            $abonne->ville = $request->input('ville');
            $abonne->pays = $request->input('pays');
            $abonne->telephone = $request->input('telephone');
            $abonne->email = $request->input('email');
            $abonne->id_table_rubrique = $request->input('id_table_rubrique');
            $abonne->id_motivation = $request->input('id_motivation');
            $abonne->save();
            DB::commit();
            return redirect('/liste_abonne');
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            DB::beginTransaction();
            Abonne::find($id)->delete();
            DB::commit();
            return view('/liste_abonne')->with('success', 'Abonne supprimé avec succes');
        } catch (\Throwable $th) {
            return back();
        }
    }
}
