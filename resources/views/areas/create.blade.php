@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
    {{ __('New Area') }}
@endsection
@section('pagetitle')
    {{ __('New Area') }}
@endsection
@section('pagelink')
    {{ __('New Area') }}
@endsection
@section('content')
<hr>
    @include('layouts.errors')
    @can('Areas List')
    <div class="row">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('areas.index') }}">Back</a>
        </div>
    </div>
    @endcan
    {!! Form::open(['route' => 'areas.store', 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="region name" name="area_name"
                        value="{{ old('area_name') }}">
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
