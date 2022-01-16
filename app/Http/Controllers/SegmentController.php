<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Segments List|Segments Create|Segments Edit|Segments Delete|Segments Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Segments List', ['only' => ['index']]);
        $this->middleware('permission:Segments Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Segments Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Segments Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Segments Show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $segments = Segment::orderBy('segment_name')->paginate(50);
        return view('segments.index',compact('segments'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('segments.create');
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
            'segment_name'=>'required|string|max:50|unique:segments,segment_name',
        ]);
        $input = $request->all();
        Segment::create($input);
        return redirect(route('segments.index'))->with(['success'=>'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function show(Segment $segment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function edit(Segment $segment,$id)
    {
        $segment = Segment::find($id);
        return view('segments.edit',compact('segment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'segment_name'=>'required|string|max:50|unique:segments,segment_name,'.$id,
        ]);
        $segment = Segment::find($id);
        if (!$segment) {
            return redirect(route('segments.index'))->with(['error'=>'invaled Segment Selected']);
        } else {
           $segment->update($request->all());
           return redirect(route('segments.index'))->with(['success'=>'Updated Successfully']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Segment $segment,$id)
    {
        $segment = Segment::find($id);
        if (!$segment) {
            return redirect(route('segments.index'))->with(['error'=>'invaled Segment Selected']);
        } else {
           $segment->delete();
           return redirect(route('segments.index'))->with(['success'=>'deleted successfully']);
        }
    }
}
