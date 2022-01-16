<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Dispatches List|Dispatches Create|Dispatches Edit|Dispatches Delete|Dispatches Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Dispatches List', ['only' => ['index']]);
        $this->middleware('permission:Dispatches Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Dispatches Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Dispatches Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Dispatches Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dispatches = Dispatch::orderBy('name')->paginate(50);
        return view('dispatches.index', compact('dispatches'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dispatches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:75|unique:dispatches,name',
            'location' => 'required|string',
            'ports' => 'required|numeric',
        ]);
        Dispatch::create($request->all());
        return redirect(route('dispatches.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function show(Dispatch $dispatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dispatch = Dispatch::find($id);
        return view('dispatches.edit', compact('dispatch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:75|unique:dispatches,name,' . $id,
            'location' => 'required|string',
            'ports' => 'required|numeric',
        ]);
        $dispatch = Dispatch::find($id);
        $dispatch->update($request->all());
        return redirect(route('dispatches.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dispatch = Dispatch::find($id);
        $dispatch->delete();
        return redirect(route('dispatches.index'))->with(['success' => 'deleted successfully']);
    }
}
