<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Http\Requests\CoursRequest;

class CoursController extends Controller
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
            $cours = Cours::query()
                ->where('name_cours', 'like', "%{$query}%")
                ->where('deleted_status', '0')
                ->orwhere('description_cours', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $cours = Cours::where('deleted_status', 0)->orderBy('id', 'desc')->get();
        }
        return view("cours.index", compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("cours.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursRequest $request)
    {
        //
        $cours = Cours::create($request->validated());
        return redirect()->route('cours.index')->with('success', "Cours created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cours = Cours::where('id', $id)->get()->first();
        return Response()->json($cours);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cours = Cours::find($id);
        return view("cours.edit", compact('cours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoursRequest $request, $id)
    {
        //
        $validated = $request->validated();
        $niveau = Cours::find($id);
        $niveau->name_cours = $request->name_cours;
        $niveau->description_cours = $request->description_cours;
        $niveau->hours_cours = $request->hours_cours;
        $niveau->update();
        return redirect()->route('cours.index')->with('success', "Cours modified Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $is = Cours::where('id', $id)->update(array('deleted_status' => 1));
        if ($is) {
            return Response()->json(['ok' => 'success']);
        }
    }
}
