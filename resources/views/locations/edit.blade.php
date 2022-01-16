@extends('layouts.app')
@section('title')
    {{ __('Edit Location') }} || {{ $location->location_name }}
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pagetitle')
    {{ __('Edit Location') }} || <span class="text-danger">{{ $location->location_name }}</span>
@endsection
@section('pagelink')
    {{ __('Edit Location') }}
@endsection
@section('content')
<hr>
    @include('layouts.sessions')
    @include('layouts.errors')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('locations.index') }}">Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['locations.update', $location->id], 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="region name"
                        name="location_name" value="{{ $location->location_name }}">
                    <label for="floatingInput">{{ __('Location Name') }}</label>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
