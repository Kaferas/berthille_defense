<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;

class GroupController extends Controller
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
            $groups = Group::query()
                ->where('name_group', 'like', "%{$query}%")
                ->where('deleted_status', '0')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $groups = Group::where('deleted_status', 0)->orderBy('id', 'desc')->get();
        }
        return view("groups.index", compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("groups.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $group = Group::create($request->validated());
        return redirect()->route('groups.index')->with('success', "Group created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::where('id', $id)->get()->first();
        return Response()->json($group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view("groups.edit", compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validated();
        $groups = Group::find($id);
        $groups->name_group = $request->name_group;
        $groups->update();
        return redirect()->route('groups.index')->with('success', "Group modified Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is = Group::where('id', $id)->update(array('deleted_status' => 1));
        if ($is) {
            return Response()->json(['ok' => 'success']);
        }
    }
}
