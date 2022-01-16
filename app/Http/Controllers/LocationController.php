<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Locations List|Locations Create|Locations Edit|Locations Delete|Locations Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Locations List', ['only' => ['index']]);
        $this->middleware('permission:Locations Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Locations Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Locations Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Locations Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Location::orderBy('location_name')->paginate(50);
        return view('locations.index', compact('locations'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
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
            'location_name' => 'required|string|max:75|unique:locations,location_name',
        ]);
        $input = $request->all();
        Location::create($input);
        return redirect(route('locations.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $location = Location::find($id);
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'location_name' => 'required|string|max:75|unique:locations,location_name,' . $id,
        ]);
        $location = Location::find($id);
        $location->update($request->all());
        return redirect(route('locations.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect(route('locations.index'))->with(['success' => 'deleted successfully']);
    }
}
