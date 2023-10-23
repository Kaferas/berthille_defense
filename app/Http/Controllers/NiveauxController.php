<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use App\Http\Requests\NiveauxRequest;

class NiveauxController extends Controller
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
            $niveaux = Niveau::query()
                ->where('nom_niveau', 'like', "%{$query}%")
                ->where('delete_status', '0')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $niveaux = Niveau::where('delete_status', 0)->orderBy('id', 'desc')->get();
        }
        return view("niveaux.index", compact('niveaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("niveaux.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NiveauxRequest $request)
    {
        $niveaux = Niveau::create($request->validated());
        return redirect()->route('niveaux.index')->with('success', "Niveaau created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $niveau = Niveau::where('id', $id)->get()->first();
        return Response()->json($niveau);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $niveau = Niveau::find($id);
        return view("niveaux.edit", compact('niveau'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NiveauxRequest $request, $id)
    {
        $validated = $request->validated();
        $niveau = Niveau::find($id);
        $niveau->nom_niveau = $request->nom_niveau;
        $niveau->update();
        return redirect()->route('niveaux.index')->with('success', "Niveaux modified Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is = Niveau::where('id', $id)->update(array('delete_status' => 1));
        if ($is) {
            return Response()->json(['ok' => 'success']);
        }
    }
}
