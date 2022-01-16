<?php

namespace App\Http\Controllers;

use App\Models\CleaningTool;
use Illuminate\Http\Request;

class CleaningToolController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Cleaning Tools List|Cleaning Tools Create|Cleaning Tools Edit|Cleaning Tools Delete|Cleaning Tools Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Cleaning Tools List', ['only' => ['index']]);
        $this->middleware('permission:Cleaning Tools Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Cleaning Tools Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Cleaning Tools Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Cleaning Tools Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tools = CleaningTool::orderBy('cleaning_tool')->paginate(50);
        return view('cleaning tool.index', compact('tools'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cleaning tool.create');
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
            'cleaning_tool' => 'required|string|max:75|unique:cleaning_tools,cleaning_tool',
        ]);
        CleaningTool::create($request->all());
        return redirect(route('cleaning.tools.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CleaningTool  $cleaningTool
     * @return \Illuminate\Http\Response
     */
    public function show(CleaningTool $cleaningTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CleaningTool  $cleaningTool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tool = CleaningTool::find($id);
        return view('cleaning tool.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CleaningTool  $cleaningTool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cleaning_tool' => 'required|string|max:75|unique:cleaning_tools,cleaning_tool,' . $id,
        ]);
        $tool = CleaningTool::find($id);
        $tool->update($request->all());
        return redirect(route('cleaning.tools.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CleaningTool  $cleaningTool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = CleaningTool::find($id);
        $tool->delete();
        return redirect(route('cleaning.tools.index'))->with(['success' => 'deleted successfully']);
    }
}
