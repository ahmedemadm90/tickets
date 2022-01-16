@extends('layouts.app')
@section('title')
    {{__('New Role')}}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>

    @include('layouts.sessions')

    {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="mt-2">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" placeholder="name" name="name">
                <label for="name">Role Name</label>
            </div>
        </div>
        <h3 class="text-center mb-2 text-capitalize">{{ __('Permissions') }}</h3>
        <hr class="w-75 m-auto">
        @foreach ($permission as $value)
            <div class="col-md-4 mt-2">
                <input type="checkbox" name="permission[]" data-bootstrap-switch data-off-color="danger"
                    data-on-color="success" value="{{ $value->id }}" id="{{ $value->id }}">
                <label for="{{ $value->id }}">{{ $value->name }}</label>
            </div>
        @endforeach
        <div class="row text-center border-top m-2">
            <button type="submit" class="btn btn-primary w-25 m-auto">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('pageheader')
    {{__('Create New Role')}}
@endsection
