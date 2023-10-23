<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfesseurRequest;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query = request('query_search');

        if ($query) {

            $professeurs = Professeur::query()
                ->where('delete_status', '0')
                ->where('name', 'like', "%{$query}%")
                ->orWhere('prenom', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $professeurs = Professeur::where('delete_status', 0)->orderBy('id', 'desc')->get();
        }
        return view("professeur.index", compact('professeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("professeur.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfesseurRequest $request)
    {
        $professeur = Professeur::create($request->validated());
        $request->session()->flash('professeur.id', $professeur->id);
        return redirect()->route('professeur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eleve = Professeur::where('id', $id)->get()->first();
        return Response()->json($eleve);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professeur = Professeur::find($id);
        return view("professeur.edit", compact('professeur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfesseurRequest $request, $id)
    {
        $validated = $request->validated();
        $eleve = Professeur::find($id);
        $eleve->name = $request->name;
        $eleve->prenom = $request->prenom;
        $eleve->email = $request->email;
        $eleve->phone_number = $request->phone_number;
        $eleve->cni_number = $request->cni_number;
        $eleve->adresse = $request->adresse;
        $eleve->update();
        return redirect()->route('professeur.index')->with('success', "Professeur modified Successfully");
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is = Professeur::where('id', $id)->update(array('delete_status' => 1));
        if ($is) {
            return Response()->json(['ok' => 'success']);
        }
    }
}
