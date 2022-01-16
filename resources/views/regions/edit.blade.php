@extends('layouts.app')
@section('pagetitle')
    {{ __('Edit Region') }} || <span class="text-danger">{{ $region->region_name }}</span>
@endsection
@section('pagelink')
    {{ __('Edit Camera Region') }}
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    @include('layouts.sessions')
    <div class="row">
        <hr>
        @can('Regions List')
            <div class="col-lg-12 mb-3">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('regions.index') }}">Back</a>
                </div>
            </div>
        @endcan
    </div>
    {!! Form::open(['route' => ['regions.update', $region->id], 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="region name" name="region_name"
                        value="{{ $region->region_name }}">
                    <label for="floatingInput">{{ __('Region') }}</label>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
