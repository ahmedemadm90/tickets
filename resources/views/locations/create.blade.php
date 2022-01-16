@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
  {{ __('New Location') }}
@endsection
@section('pagetitle')
    {{ __('New Location') }}
@endsection
@section('pagelink')
    {{ __('New Location') }}
@endsection
@section('content')

    <hr>
    @can('Locations List')
    <div class="row">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('locations.index') }}">Back</a>
        </div>
    </div>
    @endcan
    @include('layouts.sessions')
    {!! Form::open(['route' => 'locations.store', 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="location name"
                        name="location_name" value="{{ old('location_name') }}">
                    <label for="floatingInput">{{ __('Location Name') }}</label>
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
