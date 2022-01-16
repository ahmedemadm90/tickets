@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
    {{ __('New Record Device') }}
@endsection
@section('pagetitle')
    {{ __('New Record Device') }}
@endsection
@section('pagelink')
    {{ __('New Record Device') }}
@endsection
@section('content')
    <hr>
    @include('layouts.errors')
    @include('layouts.sessions')
    <div class="row">
        <div class="col-lg mb-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('record.devices.index') }}">Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => 'record.devices.store', 'method' => 'POST']) !!}
    <div class="row text-capitalize">
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="name" class="form-control" id="floatingInput" placeholder="record device" name="device"
                    value="{{ old('device_name') }}">
                <label for="floatingInput">{{ __('Record Device') }}</label>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="name" class="form-control" id="floatingInput" placeholder="record device" name=" location"
                    value="{{ old(' location') }}">
                <label for="floatingInput">{{ __('Record Device location') }}</label>
            </div>
        </div>
    </div>
    <br>
    <div class="row text-capitalize">
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="number" class="form-control" id="floatingInput" placeholder="Start IP" name="channels"
                    value="{{ old('channels') }}">
                <label for="floatingInput">{{ __('channels') }}</label>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Start IP" name="device_ip"
                    value="{{ old('device_ip') }}">
                <label for="floatingInput">{{ __('device ip') }}</label>
            </div>
        </div>
    </div>
    <br>
    <div class="row text-capitalize">
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Start IP" name="username"
                    value="{{ old('username') }}">
                <label for="floatingInput">{{ __('username') }}</label>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Start IP" name="password"
                    value="{{ old('password') }}">
                <label for="floatingInput">{{ __('password') }}</label>
            </div>
        </div>
    </div>
    <div class="row m-2 text-center">
        <div class="col-xs col-sm col-md text-center">
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
        </div>
    </div>
    </div>
    {!! Form::close() !!}
@endsection
