@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('title')
    CEMEX || {{ __('New Segment') }}
@endsection
@section('pagetitle')
    {{ __('New Segment') }}
@endsection
@section('pagelink')
    {{ __('New Segment') }}
@endsection
@section('content')
    @include('layouts.sessions')
    <div class="row overflow-hidden">
        <hr>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('segments.index') }}">Back</a>
        </div>
    </div>
    {!! Form::open(['route' => 'segments.store', 'method' => 'POST']) !!}
    <div class="row w-50 m-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInput" placeholder="segment name"
                        name="segment_name">
                    <label for="floatingInput">{{ __('Segment Name') }}</label>
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
