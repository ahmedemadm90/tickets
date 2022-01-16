<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceTool;
use Illuminate\Http\Request;

class MaintenanceToolController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Maintenance Tools List|Maintenance Tools Create|Maintenance Tools Edit|Maintenance Tools Delete|Maintenance Tools Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Maintenance Tools List', ['only' => ['index']]);
        $this->middleware('permission:Maintenance Tools Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Maintenance Tools Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Maintenance Tools Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Maintenance Tools Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tools = MaintenanceTool::orderBy('maintenance_tool')->paginate(50);
        return view('maintenance tool.index', compact('tools'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance tool.create');
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
            'maintenance_tool' => 'required|string|max:75|unique:maintenance_tools,maintenance_tool',
        ]);
        MaintenanceTool::create($request->all());
        return redirect(route('maintenance.tools.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaintenanceTool  $maintenanceTool
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceTool $maintenanceTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaintenanceTool  $maintenanceTool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tool = MaintenanceTool::find($id);
        return view('maintenance tool.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaintenanceTool  $maintenanceTool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'maintenance_tool' => 'required|string|max:75|unique:maintenance_tools,maintenance_tool,' . $id,
        ]);
        $tool = MaintenanceTool::find($id);
        $tool->update($request->all());
        return redirect(route('maintenance.tools.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaintenanceTool  $maintenanceTool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = MaintenanceTool::find($id);
        $tool->delete();
        return redirect(route('maintenance.tools.index'))->with(['success' => 'deleted successfully']);
    }
}
