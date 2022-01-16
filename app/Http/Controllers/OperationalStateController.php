<?php

namespace App\Http\Controllers;

use App\Models\OperationalState;
use Illuminate\Http\Request;

class OperationalStateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Operational State List|Operational State Create|Operational State Edit|Operational State Delete|Operational State Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Operational State List', ['only' => ['index']]);
        $this->middleware('permission:Operational State Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Operational State Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Operational State Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Operational State Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = OperationalState::paginate(50);
        return view('operation state.index', compact('states'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operation state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'state' => 'required|string|max:50|unique:operational_states,state',
        ]);
        OperationalState::create($request->all());
        return redirect(route('op.states.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperationalState  $OperationalState
     * @return \Illuminate\Http\Response
     */
    public function show(OperationalState $OperationalState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperationalState  $OperationalState
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = OperationalState::find($id);
        return view('operation state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OperationalState  $OperationalState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'state' => 'required|string|max:50|unique:operational_states,state,' . $id,
        ]);
        $state = OperationalState::find($id);
        $state->update($request->all());
        return redirect(route('op.states.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationalState  $OperationalState
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = OperationalState::find($id);
        $state->delete();
        return redirect(route('op.states.index'))->with(['success' => 'deleted successfully']);
    }
}
