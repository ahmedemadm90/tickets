<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexOld()
    {
        $total = Camera::count();
        /* Start State Chart */
        $online = Camera::where('state', 'online')->count();
        $offline = Camera::where('state', 'offline')->count();
        $stateChart = app()->chartjs
            ->name('piestateChart')
            ->type('pie')
            ->size(['width' => 200, 'height' => 200])
            ->labels(['Online', 'Offline'])
            ->datasets([
                [
                    'backgroundColor' => ['#80ED99', '#EA5455'],
                    'data' => [$online, $offline]
                ],
            ])
            ->options([]);
        /* End State Chart */
        /* Start Segment Chart */
        $segmentsArr = [];
        $segmentsCount = [];
        $segments = Camera::select('segment')->groupBy('segment')->get();
        //dd($segments);
        foreach ($segments as $segment) {
            //dd($segment->segment);
            $count = Camera::where('segment', $segment->segment)->count();
            array_push($segmentsArr, $segment->segment);
            array_push($segmentsCount, $count);
        }
        $segmentDateset = array_combine($segmentsArr, $segmentsCount);
        $segmentChart = app()->chartjs
            ->name('piesegmentChart')
            ->type('pie')
            ->size(['width' => 200, 'height' => 200])
            ->labels(array_keys($segmentDateset))
            ->datasets([
                [
                    "label" => "Cameras By Segment",
                    'backgroundColor' => ['#2B2E4A', '#F67280', '#0D7377', '#3282B8'],
                    'data' => array_values($segmentDateset)
                ],
            ])
            ->options([]);
        /* End Segment Chart */
        /* Start Region Chart */
        $regionsArr = [];
        $regionsCount = [];
        $regions = Camera::select('region')->groupBy('region')->get();

        foreach ($regions as $region) {
            //dd($segment->segment);
            $count = Camera::where('region', $region->region)->count();
            array_push($regionsArr, $region->region);
            array_push($regionsCount, $count);
        }
        $regionsDateset = array_combine($regionsArr, $regionsCount);
        $regionsChart = app()->chartjs
            ->name('pieregionsChart')
            ->type('pie')
            ->size(['width' => 200, 'height' => 200])
            ->labels(array_keys($regionsDateset))
            ->datasets([
                [
                    "label" => "Cameras By Segment",
                    'backgroundColor' => ['#3EC1D3', '#EA5455', '#D4A5A5', '#FF5722'],
                    'data' => array_values($regionsDateset)
                ],
            ])
            ->options([]);
        /* End Region Chart */
        /* Start Year Chart */
        $yearArr = [];
        $yearCount = [];
        $years = Camera::select('year')->groupBy('year')->get();

        foreach ($years as $year) {
            $count = Camera::where('year', $year->year)->count();
            array_push($yearArr, $year->year);
            array_push($yearCount, $count);
        }
        $yearsDateset = array_combine($yearArr, $yearCount);
        $yearsChart = app()->chartjs
            ->name('pieyearChart')
            ->type('bar')
            ->size(['width' => 200, 'height' => 200])
            ->labels(array_keys($yearsDateset))
            ->datasets([
                [
                    "label" => "Cameras By Year",
                    'backgroundColor' => ['#3EC1D3', '#EA5455', '#D4A5A5', '#FF5722'],
                    'data' => array_values($yearsDateset)
                ],
            ])
            ->options([]);
        /* End Region Chart */
        /* Start Operational Chart */
        $operationalArr = [];
        $operationalCount = [];
        $cams = Camera::select('is_operation')->groupBy('is_operation')->get();
        foreach ($cams as $cam) {
            $count = Camera::where('is_operation', $cam->is_operation)->count();
            array_push($operationalArr, $cam->is_operation);
            array_push($operationalCount, $count);
        }
        //dd($operationalCount);
        $operationDateset = array_combine($operationalArr, $operationalCount);
        $operationsChart = app()->chartjs
            ->name('pieoperationsChart')
            ->type('pie')
            ->size(['width' => 200, 'height' => 200])
            ->labels(array_keys($operationDateset))
            ->datasets([
                [
                    "label" => "Cameras By Segment",
                    'backgroundColor' => ['#EA5455', '#80ED99'],
                    'data' => array_values($operationDateset)
                ],
            ])
            ->options([]);
        /* End Operational Chart */
        return view('home', compact(
            'online',
            'offline',
            'total',
            'stateChart',
            'segmentChart',
            'regionsChart',
            'yearsChart',
            'operationsChart',
        ));
    }
    public function index(Request $request)
    {
        return view('home');
    }
}
