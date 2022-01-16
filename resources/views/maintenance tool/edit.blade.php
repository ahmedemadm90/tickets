@extends('layouts.app')
@section('title')
    {{ __('Edit Maintenance Tool') }} || {{ $tool->tool }}
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pagetitle')
    {{ __('Edit Maintenance Tool') }} || <span class="text-danger">{{ $tool->maintenance_tool }}</span>
@endsection
@section('pagelink')
    {{ __('Edit Maintenance Tool') }}
@endsection
@section('content')
<hr>
    @include('layouts.sessions')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('maintenance.tools.index') }}">Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['maintenance.tools.update', $tool->id], 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12 m-1">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="dispatch name" name="maintenance_tool"
                        value="{{ $tool->maintenance_tool }}">
                    <label for="floatingInput">{{ __('Tool Name') }}</label>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center text-capitalize">
                <button type="submit" class="btn btn-primary">{{__('update')}}</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
