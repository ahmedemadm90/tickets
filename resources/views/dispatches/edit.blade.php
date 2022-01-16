@extends('layouts.app')
@section('title')
    {{ __('Edit Switch') }} || {{ $dispatch->dispatch_name }}
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('page-title')
    {{ __('Edit Switch') }} || {{ $dispatch->dispatch_name }}
    <hr>
@endsection
@section('content')
    @include('layouts.sessions')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dispatches.index') }}">Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['dispatches.update', $dispatch->id], 'method' => 'POST']) !!}
    <div class="row w-75 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12 m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="dispatch name"
                        name="name" value="{{ $dispatch->name }}">
                    <label for="floatingInput">{{ __('Dispatch Name') }}</label>
                </div>
            </div>
        </div>
        <div class="col-xs col-sm col-md m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="dispatch location"
                        name="location" value="{{ $dispatch->location }}">
                    <label for="floatingInput">{{ __('Dispatch location') }}</label>
                </div>
            </div>
        </div>
        <div class="col-xs col-sm col-md m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="dispatch Ports" name="ports"
                        value="{{ $dispatch->ports }}">
                    <label for="floatingInput">{{ __('Dispatch Ports') }}</label>
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
