<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Http\Requests\BatchRequest;

class BatchController extends Controller
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
            $batchs = Batch::query()
                ->where('name_batch', 'like', "%{$query}%")
                ->where('deleted_status', '0')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $batchs = Batch::where('deleted_status', 0)->orderBy('id', 'desc')->get();
        }
        return view("batchs.index", compact('batchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("batchs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatchRequest $request)
    {
        $batchs = Batch::create($request->validated());
        return redirect()->route('batchs.index')->with('success', "Batchs created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batch = Batch::where('id', $id)->get()->first();
        return Response()->json($batch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch = Batch::find($id);
        $batch->begin_hour = date_format(date_create($batch->begin_hour), "H:i");
        $batch->end_hour = date_format(date_create($batch->end_hour), "H:i");
        return view("batchs.edit", compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatchRequest $request, $id)
    {
        $validated = $request->validated();
        $batch = Batch::find($id);
        $batch->name_batch = $request->name_batch;
        $batch->begin_hour = date_format(date_create($request->begin_hour), "H:i");
        $batch->end_hour = date_format(date_create($request->end_hour), "H:i");
        $batch->update();
        return redirect()->route('batchs.index')->with('success', "Batch modified Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is = Batch::where('id', $id)->update(array('deleted_status' => 1));
        if ($is) {
            return Response()->json(['ok' => 'success']);
        }
    }
}
