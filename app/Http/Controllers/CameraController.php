<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Cameras List|Cameras Create|Cameras Edit|Cameras Delete|Cameras Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Cameras List', ['only' => ['index']]);
        $this->middleware('permission:Cameras Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Cameras Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Cameras Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Cameras Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cams = Camera::orderBy('code')->orderBy('updated_at')->get();
        return view('cameras.index', compact('cams'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cameras.create');
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

        $gallery = [];
        $request->validate([
            "code" => "required|string|unique:cameras,code",
            "region_id" => "required|exists:regions,id",
            "segment_id" => "required|exists:segments,id",
            "area_id" => "required|exists:areas,id",
            "en_name" => "required|string|max:75",
            "ar_name" => "required|string|max:75",
            "operational_state_id" => "required",
            "vlan_id" => "required|exists:vlans,id",
            "record_device_id" => "required|exists:record_devices,id",
            "ch_no" => "required",
            "state" => "required",
            "dispatch_id" => "required|exists:dispatches,id",
            "maintenance_category_id" => "nullable|exists:maintenance_categories,id",
            "maintenance_tool_id" => "required|exists:maintenance_tools,id",
            "cleaning_tool_id" => "required|exists:cleaning_tools,id",
            "camera_type" => "required",
            "company" => "required",
            "year" => "required",
            "gallery" => "required",
            "alarm" => "in:0,1",
            "ping" => "in:0,1",
            "ip" => "required|ip",
        ]);
        if (!isset($request->has_alarm)) {
            $request->has_alarm = 0;
        } else {
            $request->has_alarm = 1;
        }
        if (!isset($request->ping)) {
            $request->ping = 0;
        } else {
            $request->ping = 1;
        }
        foreach ($input['gallery'] as $img) {
            $ext = $img->extension();
            $imageName = uniqid() . "." . $ext;
            array_push($gallery, $imageName);
            $img->move(public_path("media/cameras/images"), $imageName);
        }
        $input['gallery'] = $gallery;
        Camera::create($input);
        return redirect()->route('cameras.index')->with(['success' => 'Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camera = Camera::find($id);
        if($camera){
            return view('cameras.show',compact('camera'));
        }else{
            return back()->with(['error'=>'No Camera With This Code']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $camera = Camera::find($id);
        return view('cameras.edit', compact('camera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $camera = Camera::find($id);
        $gallery = [];
        //dd($request->gallery);
        $request->validate([
            'ip' => 'required||unique:cameras,id,' . $id,
            "code" => "required|string|unique:cameras,code," . $id,
            "region_id" => "required|exists:regions,id",
            "segment_id" => "required|exists:segments,id",
            "area_id" => "required|exists:areas,id",
            "en_name" => "required|string|max:75",
            "ar_name" => "required|string|max:75",
            "operational_state_id" => "required",
            "vlan_id" => "required|exists:vlans,id",
            "record_device_id" => "required|exists:record_devices,id",
            "ch_no" => "required",
            "state" => "required",
            "dispatch_id" => "required|exists:dispatches,id",
            "maintenance_category_id" => "nullable|exists:maintenance_categories,id",
            "maintenance_tool_id" => "required|exists:maintenance_tools,id",
            "cleaning_tool_id" => "required|exists:cleaning_tools,id",
            "camera_type" => "required",
            "company" => "required",
            "year" => "required",
            "alarm" => "in:0,1",
            "ping" => "in:0,1",
        ]);
        if ($request->file('gallery')) {
            if (isset($camera->gallery)) {
                foreach ($camera->gallery as $img) {
                    unlink('media/cameras/images/' . $img);
                }
            }
            foreach ($input['gallery'] as $img) {
                $ext = $img->extension();
                $imageName = uniqid() . "." . $ext;
                array_push($gallery, $imageName);
                $img->move(public_path("media/cameras/images"), $imageName);
            }
            $input['gallery'] = $gallery;
        } else {
            $input['gallery'] = $camera->gallery;
        }
        if (!$request->alarm) {
            $input['alarm'] = 0;
        }
        if (!$request->ping) {
            $input['ping'] = 0;
        }
        $camera->update($input);
        return redirect()->route('cameras.index')->with(['success' => 'Created Successfully']);
    }
    public function find(Request $request)
    {
        $cams = Camera::where('ar_name', 'like',  "%" . $request['keywords'] . "%")
            ->orWhere('code', 'like',  "%" . $request['keywords'] . "%")
            ->orWhere('en_name', 'like',  "%" . $request['keywords'] . "%")
            ->orWhere('ar_name', 'like',  "%" . $request['keywords'] . "%")
            ->orWhere('ip', 'like',  "%" . $request['keywords'] . "%")
            ->orWhere('year', 'like',  "%" . $request['keywords'] . "%")->orderBy('updated_at')->get();

        return view('cameras.search', compact('cams'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camera = Camera::find($id);
        if ($camera->allery) {
            foreach ($camera->gallery as $img) {
                unlink('media/cameras/images/' . $img);
            }
        }
        $camera->delete();
        return redirect()->route('cameras.index')->with(['success' => 'Deleted Successfully']);
    }
    public function offline(Request $request)
    {
        $cams = Camera::where('state', 'offline')->orderBy('updated_at')->get();
        return view('cameras.offline', compact('cams'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function online(Request $request)
    {
        $cams = Camera::where('state', 'online')->orderBy('updated_at')->get();
        return view('cameras.online', compact('cams'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
