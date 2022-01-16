@extends('layouts.app')
@section('title')
    {{ __('Edit Segment') }} || {{ $segment->segment_name }}

@endsection
@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('header')
@include('layouts.header')
@endsection
@section('page-title')
{{ __('Edit Segment') }} || {{ $segment->segment_name }}
    <hr>
@endsection
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('segments.index') }}">Back</a>
        </div>
    </div>
</div>
{!! Form::open(array('route' => ['segments.update',$segment->id],'method'=>'POST')) !!}
<div class="row w-50 m-auto">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="col m-auto">
            <div class="form-floating">
                <input type="name" class="form-control" id="floatingInput" placeholder="region name" name="segment_name" value="{{$segment->segment_name}}">
                <label for="floatingInput">{{__('Segment Name')}}</label>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
{!! Form::close() !!}
@endsection


