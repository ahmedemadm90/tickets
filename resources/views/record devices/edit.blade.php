@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
    {{ __('Edit Record Device') }} || {{ $nvr->device_name }}
@endsection
@section('pagetitle')
    {{ __('Edit Record Device') }}
@endsection
@section('pagelink')
    {{ __('Edit Record Device') }}
@endsection
@section('content')
    @include('layouts.errors')
    @include('layouts.sessions')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('record.devices.index') }}">Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['record.devices.update', $nvr->id], 'method' => 'POST']) !!}
    <div class="row text-capitalize">
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="name" class="form-control" id="floatingInput" placeholder="record device" name="device"
                    value="{{ $nvr->device }}">
                <label for="floatingInput">{{ __('Record Device') }}</label>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="name" class="form-control" id="floatingInput" placeholder="record device" name=" location"
                    value="{{ $nvr->location }}">
                <label for="floatingInput">{{ __('Record Device location') }}</label>
            </div>
        </div>
    </div>
    <br>
    <div class="row text-capitalize">
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="number" class="form-control" id="floatingInput" placeholder="Start IP" name="channels"
                    value="{{ $nvr->channels }}">
                <label for="floatingInput">{{ __('channels') }}</label>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Start IP" name="device_ip"
                    value="{{ $nvr->device_ip }}">
                <label for="floatingInput">{{ __('device ip') }}</label>
            </div>
        </div>
    </div>
    <br>
    <div class="row text-capitalize">
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Start IP" name="username"
                    value="{{ $nvr->username }}">
                <label for="floatingInput">{{ __('username') }}</label>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Start IP" name="password"
                    value="{{ $nvr->password }}">
                <label for="floatingInput">{{ __('password') }}</label>
            </div>
        </div>
    </div>
    <div class="row text-center m-2">
        <button class="btn btn-primary col-md-4 m-auto">{{__('Update')}}</button>
    </div>
    {!! Form::close() !!}
@endsection
