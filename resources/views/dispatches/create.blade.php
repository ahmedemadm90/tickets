@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
    CEMEX || {{ __('New Dispatch') }}
@endsection
@section('pagetitle')
    {{ __('New Dispatch') }}
@endsection
@section('pagelink')
    {{ __('New Dispatch') }}
@endsection
@section('content')
    @include('layouts.sessions')
    <hr>
    @can('Dispatches List')
    <div class="row">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('dispatches.index') }}">Back</a>
        </div>
    </div>
    @endcan
    {!! Form::open(['route' => 'dispatches.store', 'method' => 'POST']) !!}
    <div class="row w-75 m-auto">
        <div class="col-xs col-sm col-md m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="dispatch name"
                        name="name" value="{{ old('dispatch_name') }}">
                    <label for="floatingInput">{{ __('Dispatch Name') }}</label>
                </div>
            </div>
        </div>
        <div class="col-xs col-sm col-md m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="dispatch location"
                        name="location" value="{{ old('location') }}">
                    <label for="floatingInput">{{ __('Dispatch location') }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 m-1 m-auto">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" placeholder="dispatch ports"
                        name="ports" value="{{ old('ports') }}">
                    <label for="floatingInput">{{ __('Dispatch Ports') }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
