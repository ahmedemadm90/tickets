<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceCategory;
use Illuminate\Http\Request;

class MaintenanceCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Maintenance Categories List|Maintenance Categories Create|Maintenance Categories Edit|Maintenance Categories Delete|Maintenance Categories Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Maintenance Categories List', ['only' => ['index']]);
        $this->middleware('permission:Maintenance Categories Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Maintenance Categories Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Maintenance Categories Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Maintenance Categories Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cats = MaintenanceCategory::orderBy('maintenance_category')->paginate(50);
        return view('maintenance category.index', compact('cats'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance category.create');
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
            'maintenance_category' => 'required|string|max:75|unique:maintenance_categories,maintenance_category',
        ]);
        MaintenanceCategory::create($request->all());
        return redirect(route('maintenance.category.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaintenanceCategory  $maintenanceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceCategory $maintenanceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaintenanceCategory  $maintenanceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = MaintenanceCategory::find($id);
        return view('maintenance category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaintenanceCategory  $maintenanceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'maintenance_category' => 'required|string|max:75|unique:maintenance_categories,maintenance_category,' . $id,
        ]);
        $tool = MaintenanceCategory::find($id);
        $tool->update($request->all());
        return redirect(route('maintenance.category.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaintenanceCategory  $maintenanceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = MaintenanceCategory::find($id);
        $tool->delete();
        return redirect(route('maintenance.category.index'))->with(['success' => 'deleted successfully']);
    }
}
