@extends('layouts.app')
@section('title')
    {{ __('New Camera') }}
@endsection
@section('pagetitle')
    {{ __('New Camera') }}
@endsection
@section('pagelink')
    {{ __('New Camera') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <hr class="w-100 bg-dark">
    <div class="row">
        <div class="col-md">
        <a class="btn btn-success text-capitalize col-md-3" href="{{route('cameras.index')}}">{{__('back')}}</a>
    </div>
    <div class="text-capitalize text-center" style="font-family: sans-serif">
        @include('layouts.errors')
        <form class="row m-1 text-center" action="{{ route('cameras.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row m-1">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="code" placeholder="Region"
                            value="{{ old('code') }}">
                        <label for="floatingInputGrid">{{ __('Code') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="region_id">
                            <option disabled selected hidden>{{ __('Region') }}</option>
                            @foreach (App\Models\Region::orderBy('region_name')->get() as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Region') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="segment_id">
                            <option disabled selected hidden>{{ __('Segment') }}</option>
                            @foreach (App\Models\Segment::get() as $segment)
                                <option value="{{ $segment->id }}">{{ $segment->segment_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Segment') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="area_id">
                            <option disabled selected hidden>{{ __('Area') }}</option>
                            @foreach (App\Models\Area::get() as $area)
                                <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Area') }}</label>
                    </div>
                </div>
            </div>
            <div class="row m-1">
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="location_id">
                            <option disabled selected hidden>{{ __('Location') }}</option>
                            @foreach (App\Models\Location::get() as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Location') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="en_name" placeholder="en name"
                            value="{{ old('en_name') }}">
                        <label for="floatingInputGrid">{{ __('English Camera Name') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="ar_name" placeholder="ar name"
                            value="{{ old('ar_name') }}">
                        <label for="floatingInputGrid">{{ __('Arabic Camera Name') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="operational_state_id">
                            <option disabled selected hidden>{{ __('Operational State') }}</option>
                            @foreach (App\Models\OperationalState::get() as $state)
                                <option value="{{ $state->id }}">{{ $state->state }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Operational State') }}</label>
                    </div>
                </div>
            </div>
            <div class="row m-1">
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="vlan_id">
                            <option disabled selected hidden>{{ __('Vlan') }}</option>
                            @foreach (App\Models\Vlan::get() as $vlan)
                                <option value="{{ $vlan->id }}">{{ $vlan->vlan_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Vlan') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="record_device_id">
                            <option disabled selected hidden>{{ __('Choose Record Device') }}</option>
                            @foreach (App\Models\RecordDevice::get() as $nvr)
                                <option value="{{ $nvr->id }}">{{ $nvr->device }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Record Device') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" name="ch_no" placeholder="ch_no"
                            value="{{ old('ch_no') }}">
                        <label for="floatingInputGrid">{{ __('CH No.') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="state">
                            <option disabled selected hidden>{{ __('State') }}</option>
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                        </select>
                        <label for="floatingInputGrid">{{ __('State') }}</label>
                    </div>
                </div>

            </div>
            <div class="row m-1">
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="dispatch_id">
                            <option disabled selected hidden>{{ __('Switch') }}</option>
                            @foreach (App\Models\Dispatch::get() as $switch)
                                <option value="{{ $switch->id }}">{{ $switch->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Switch') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="maintenance_category_id">
                            <option disabled selected hidden>{{ __('Leave Unselected If Online') }}</option>
                            @foreach (App\Models\MaintenanceCategory::get() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->maintenance_category }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Maintenance Category') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="maintenance_tool_id">
                            <option disabled selected hidden>{{ __('Maintenance Tool') }}</option>
                            @foreach (App\Models\MaintenanceTool::get() as $tool)
                                <option value="{{ $tool->id }}">{{ $tool->maintenance_tool }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Maintenance Tool') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="cleaning_tool_id">
                            <option disabled selected hidden>{{ __('Cleaning Tool') }}</option>
                            @foreach (App\Models\CleaningTool::get() as $tool)
                                <option value="{{ $tool->id }}">{{ $tool->cleaning_tool }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInputGrid">{{ __('Cleaning Tool') }}</label>
                    </div>
                </div>

            </div>
            <div class="row m-1">
                <div class="col-md">
                    <div class="form-floating">
                        <select id="" class="form-select" name="camera_type">
                            <option disabled selected hidden>{{ __('Choose Camera Type') }}</option>
                            <option value="analog">{{ __('Analog') }}</option>
                            <option value="ip fixed">{{ __('IP Fixed') }}</option>
                        </select>
                        <label for="floatingInputGrid">{{ __('Camera Connection Type') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="ip" placeholder="ip" value="{{ old('ip') }}">
                        <label for="floatingInputGrid">{{ __('IP') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="company" placeholder="company"
                            value="{{ old('company') }}">
                        <label for="floatingInputGrid">{{ __('company') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" name="year" placeholder="year"
                            value="{{ old('year') }}">
                        <label for="floatingInputGrid">{{ __('year') }}</label>
                    </div>
                </div>
            </div>
            <div class="row m-1">
                <div class="col-md">
                    <div class="">
                        <input class="form-control mt-1 fs-5" id="gallery" type="file" name="gallery[]"
                            accept=".jpg, .png, .jpeg, .gif|image/*" multiple>
                    </div>
                </div>
                <div class="form-check form-switch col-md-3 mt-3 fs-4 m-auto">
                    <input class="form-check-input" type="checkbox" role="switch" id="has_alarm" value="1" name="alarm">
                    <label class="form-check-label" for="has_alarm">{{ __('Alarm') }}</label>
                </div>
                <div class="form-check form-switch col-md-3 mt-3 fs-4 m-auto">
                    <input class="form-check-input" type="checkbox" role="switch" id="ping" value="1" name="ping">
                    <label class="form-check-label" for="ping">{{ __('ping') }}</label>
                </div>
            </div>
            <div class="row text-center">
                <button type="submit" class="btn btn-success mt-2 w-25 m-auto">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
@endsection
