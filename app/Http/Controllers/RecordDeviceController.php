<?php

namespace App\Http\Controllers;

use App\Models\RecordDevice;
use Illuminate\Http\Request;

class RecordDeviceController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:Record Devices List|Record Devices Create|Record Devices Edit|Record Devices Delete|Record Devices Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Record Devices List', ['only' => ['index']]);
        $this->middleware('permission:Record Devices Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Record Devices Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Record Devices Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Record Devices Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nvrs = RecordDevice::paginate(50);
        return view('record devices.index', compact('nvrs'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record devices.create');
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
            'device' => 'required|string|unique:record_devices,device',
            'channels' => 'required|numeric',
            'location' => 'required|string',
            'device_ip' => 'required|ip',
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        RecordDevice::create($request->all());
        return redirect(route('record.devices.index'))->with(['success' => 'Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecordDevice  $recordDevice
     * @return \Illuminate\Http\Response
     */
    public function show(RecordDevice $recordDevice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecordDevice  $recordDevice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nvr = RecordDevice::find($id);
        return view('record devices.edit', compact('nvr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecordDevice  $recordDevice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'device' => 'required|string|unique:record_devices,device,' . $id,
            'channels' => 'required|numeric',
            'location' => 'required|string',
            'device_ip' => 'required|ip',
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $nvr = RecordDevice::find($id);
        $nvr->update($request->all());
        return redirect(route('record.devices.index'))->with(['success' => 'updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecordDevice  $recordDevice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nvr = RecordDevice::find($id);
        $nvr->delete();
        return redirect(route('record.devices.index'))->with(['success' => 'updated Successfully']);
    }
}
