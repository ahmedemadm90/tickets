@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
{{ __('New Operation State') }}
@endsection
@section('pagetitle')
    {{ __('New Operation State') }}
@endsection
@section('pagelink')
    {{ __('New Operation State') }}
@endsection
@section('content')
    @include('layouts.sessions')
    <hr>
    <div class="row">
        @can('Operational State List')
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('op.states.index') }}">Back</a>
        </div>
        @endcan
    </div>
    {!! Form::open(['route' => 'op.states.store', 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12 m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="dispatch name" name="state"
                        value="{{ old('state') }}">
                    <label for="floatingInput">{{ __('Operation State') }}</label>
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
