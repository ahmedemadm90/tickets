@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
    {{ __('New Maintenance Category') }}
@endsection
@section('pagetitle')
    {{ __('New Maintenance Category') }}
@endsection
@section('pagelink')
    {{ __('New Maintenance Category') }}
@endsection
@section('content')
<hr>
    @include('layouts.sessions')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('maintenance.category.index') }}">Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => 'maintenance.category.store', 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12 m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="dispatch name"
                        name="maintenance_category" value="{{ old('maintenance_category') }}">
                    <label for="floatingInput">{{ __('Maintenance category Name') }}</label>
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
