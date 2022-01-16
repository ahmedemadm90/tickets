@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
    {{ __('New Vlan') }}
@endsection
@section('pagetitle')
    {{ __('New Vlan') }}
@endsection
@section('pagelink')
    {{ __('New Vlan') }}
@endsection
@section('content')
<hr>
    @include('layouts.sessions')
    @include('layouts.errors')
    @can('Vlans List')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vlans.index') }}">Back</a>
            </div>
        </div>
    </div>
    @endcan

    {!! Form::open(['route' => 'vlans.store', 'method' => 'POST']) !!}
    <div class="row m-2 m-auto">
        <div class="col-xs col-sm col-md m-1">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="vlan name" name="vlan_name"
                        value="{{ old('vlan') }}">
                    <label for="floatingInput">{{ __('Vlan') }}</label>
                </div>
        </div>
        <div class="col-xs col-sm col-md m-1">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="Start IP" name="start_ip"
                        value="{{ old('start_ip') }}">
                    <label for="floatingInput">{{ __('Start IP') }}</label>
                </div>
        </div>
    </div>
    <div class="row m-2 m-auto">
        <div class="col-xs col-sm col-md m-1">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="End IP" name="end_ip"
                        value="{{ old('end_ip') }}">
                    <label for="floatingInput">{{ __('End IP') }}</label>
                </div>
        </div>
        <div class="col-xs col-sm col-md m-1">

                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="dispatch_id">
                        <option selected hidden disabled>{{__('Select Switch')}}</option>
                        @foreach (App\Models\Dispatch::get() as $switch)
                            <option value="{{$switch->id}}">{{$switch->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Works with selects</label>
                </div>
        </div>
    </div>
    <div class="row m-2 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </div>
    {!! Form::close() !!}
@endsection
