@extends('layouts.app')
@section('title')
    {{ __('Edit Operation State') }} || {{ $state->state }}

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('page-title')
    {{ __('Edit Operation State') }} || {{ $state->state }}
    <hr>
@endsection
@section('content')
    @include('layouts.sessions')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('op.states.index') }}">Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['op.states.update', $state->id], 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12 m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="dispatch name" name="state"
                        value="{{ $state->state }}">
                    <label for="floatingInput">{{ __('Operation State') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center text-capitalize">
                <button type="submit" class="btn btn-primary">update</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
