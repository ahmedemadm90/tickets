<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Regions List|Regions Create|Regions Edit|Regions Delete|Regions Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Regions List', ['only' => ['index']]);
        $this->middleware('permission:Regions Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Regions Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Regions Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Regions Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $regions = Region::orderBy('region_name')->paginate(50);
        return view('regions.index', compact('regions'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'region_name' => 'required|string|max:50|unique:regions,region_name',
        ]);
        Region::create($input);
        return redirect(route('regions.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region, $id)
    {
        $region = Region::find($id);
        return view('regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'region_name' => 'required|string|max:50|unique:regions,region_name,' . $id,
        ]);
        //dd($request->all());
        $region = Region::find($id);
        $input = $request->all();
        $region->update($input);
        return redirect(route('regions.index'))->with(['success' => 'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region, $id)
    {
        $region = Region::find($id);
        $region->delete();
        return redirect(route('regions.index'))->with(['success' => 'Deleted Successfully']);
    }
}
