<?php

namespace App\Http\Controllers;

use App\Models\Vlan;
use Illuminate\Http\Request;

class VlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vlans = Vlan::orderBy('vlan_name')->paginate(50);
        return view('vlans.index', compact('vlans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vlans.create');
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
            'vlan_name' => 'required|string|unique:vlans,vlan_name',
            'start_ip' => 'required|IP',
            'end_ip' => 'required|IP',
            'dispatch_id' => 'required|exists:dispatches,id',
        ]);
        Vlan::create($request->all());
        return redirect(route('vlans.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vlan  $vlan
     * @return \Illuminate\Http\Response
     */
    public function show(Vlan $vlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vlan  $vlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vlan = Vlan::find($id);
        return view('vlans.edit', compact('vlan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vlan  $vlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'vlan_name' => 'required|string|unique:vlans,vlan_name,' . $id,
            'start_ip' => 'required|IP',
            'end_ip' => 'required|IP',
            'dispatch_id' => 'required',
        ]);
        $vlan = Vlan::find($id);
        $vlan->update($request->all());
        return redirect(route('vlans.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vlan  $vlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vlan = Vlan::find($id);
        $vlan->delete();
        return redirect(route('vlans.index'))->with(['success' => 'deleted successfully']);
    }
}
