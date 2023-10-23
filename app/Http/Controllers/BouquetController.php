<?php

namespace App\Http\Controllers;

use App\Http\Requests\BouquetRequest;
use App\Models\Bouquet;
use Illuminate\Http\Request;

class BouquetController extends Controller
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
            $bouquets = Bouquet::query()
                ->where('nom_bouquet', 'like', "%{$query}%")
                ->where('deleted_status', '0')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $bouquets = Bouquet::where('deleted_status', 0)->orderBy('id', 'desc')->get();
        }
        return view("bouquets.index", compact('bouquets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("bouquets.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BouquetRequest $request)
    {
        $niveaux = Bouquet::create($request->validated());
        return redirect()->route('bouquets.index')->with('success', "Bouquet created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $niveau = Bouquet::where('id', $id)->get()->first();
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
        $bouquet = Bouquet::find($id);
        return view("bouquets.edit", compact('bouquet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BouquetRequest $request, $id)
    {
        $validated = $request->validated();
        $bouquet = Bouquet::find($id);
        $bouquet->nom_bouquet = $request->nom_bouquet;
        $bouquet->update();
        return redirect()->route('bouquets.index')->with('success', "Bouquets modified Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is = Bouquet::where('id', $id)->update(array('deleted_status' => 1));
        if ($is) {
            return Response()->json(['ok' => 'success']);
        }
    }
}
