<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Location;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /* function __construct()
    {
        $this->middleware('permission:Countries List|Country Create|Country Edit|Country Delete|Country Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Countries List', ['only' => ['index']]);
        $this->middleware('permission:Country Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Country Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Country Delete', ['only' => ['destroy']]);
        $this->middleware('permission:Country Show', ['only' => ['show']]);
    } */
    public function selectLocation(Request $request)
    {
        $areas = Location::select('id', 'location_name')->where('country_id', $request->id)
            ->orderBy('location_name')->get();
        return response()->json($areas);
    }
    public function index(Request $request)
    {
        $countries = Region::orderBy('country_name')->paginate(5);
        return view('countries.index', compact('countries'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('countries.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|max:50|unique:countries,country_name',
        ]);
        $input = $request->all();
        try {
            Region::create($input);
            return redirect()->route('countries.index')->with(['success' => 'New Country Created Successfully']);
        } catch (\Throwable $th) {
            return redirect()->route('countries.index')->with(['error' => 'Something Went Wrong Please Contact System Admin']);
        }
    }
    public function Edit(Request $request, $id)
    {
        $country = Region::find($id);
        if (!$country) {
            return redirect()->route('countries.index')->with(['error' => 'Something Went Wrong Please Contact your System Admin']);
        } else {
            return view('countries.edit', compact('country'));
        }
    }
    public function show($id)
    {
        $country = Region::find($id);
        if (!$country) {
            return redirect()->route('countries.index')->with(['error' => 'Something Went Wrong Please Contact your System Admin']);
        } else {
            return view('countries.show', compact('country'));
        }
    }
    public function Update(Request $request, $id)
    {
        $country = Region::find($id);
        if (!$country) {
            return redirect()->route('countries.index')->with(['error' => 'Something Went Wrong Please Contact your System Admin']);
        } else {
            $request->validate([
                'country_name' => 'required|unique:countries,country_name,' . $id,
            ]);
            $input = $request->all();
            $country->update($input);
            return redirect()->route('countries.index')->with(['succsess' => 'Country Name Was Successfully Updated']);
        }
        return redirect()->route('countries.index')->with(['error' => 'Something Went Wrong Please Contact System Admin']);
    }
    public function destroy($id)
    {
        $country = Region::find($id);
        $country->delete();
        return redirect()->route('countries.index')->with(['success' => 'Deleted Successfully']);
    }
}
