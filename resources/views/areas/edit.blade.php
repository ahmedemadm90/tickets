@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
    CEMEX || {{ __('Edit Area') }}
@endsection
@section('pagetitle')
    {{ __('Edit Area') }} || <span class="text-danger">{{ $area->area_name }}</span>
@endsection
@section('pagelink')
    {{ __('Edit Area') }}
@endsection
@section('content')
    @include('layouts.errors')
    <hr>
    @can('Areas List')
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('areas.index') }}">Back</a>
            </div>
        </div>
    @endcan
    {!! Form::open(['route' => ['areas.update', $area->id], 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="region name" name="area_name"
                        value="{{ $area->area_name }}">
                    <label for="floatingInput">{{ __('Area Name') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
