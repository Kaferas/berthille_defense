<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleveRequest;
use App\Models\Eleve;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class EleveController extends Controller
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
            $eleves = Eleve::query()
                ->where('name', 'like', "%{$query}%")
                ->where('delete_status', '0')
                ->orWhere('prenom', 'like', "%{$query}%")
                ->orWhere('mother_name', 'like', "%{$query}%")
                ->orWhere('father_name', 'like', "%{$query}%")
                ->orWhere('Adresse', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $eleves = Eleve::where('delete_status', 0)->orderBy('id', 'desc')->get();
        }
        return view("eleve.index", compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("eleve.create");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EleveRequest $request)
    {
        $eleve = Eleve::create($request->validated());
        return redirect()->route('eleve.index')->with('success', "Eleve created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eleve = Eleve::where('id', $id)->get()->first();
        return Response()->json($eleve);
        // return view("eleve.view", compact('eleve'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eleve = Eleve::find($id);
        $eleve->birth_date = date_format(date_create($eleve->birth_date), 'd/m/Y');
        return view("eleve.edit", compact('eleve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EleveRequest $request, $id)
    {
        $validated = $request->validated();
        $eleve = Eleve::find($id);
        $eleve->name = $request->name;
        $eleve->prenom = $request->prenom;
        $eleve->mother_name = $request->mother_name;
        $eleve->father_name = $request->father_name;
        $eleve->parent_phone1 = $request->parent_phone1;
        $eleve->parent_phone2 = $request->parent_phone2;
        $eleve->email1 = $request->email1;
        $eleve->email2 = $request->email2;
        $eleve->Adresse = $request->Adresse;
        $eleve->birth_date = $request->birth_date;
        $eleve->created_at = $request->created_at;
        $eleve->updated_at = $request->updated_at;
        $eleve->update();
        return redirect()->route('eleve.index')->with('success', "Eleve modified Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is = Eleve::where('id', $id)->update(array('delete_status' => 1));
        if ($is) {
            return Response()->json(['ok' => 'success']);
        }
    }
}
