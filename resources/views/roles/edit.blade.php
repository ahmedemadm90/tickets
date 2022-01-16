@extends('layouts.app')
@section('title')
    {{__('Edit Role')}}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left border-bottom">
                <h2>Edit Role || <span class="text-danger">{{ $role->name }}</span></h2>
            </div>
            <div class="pull-right mt-1">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

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

    {!! Form::open(['route' => ['roles.update', $role->id], 'method' => 'POST']) !!}
    <div class="row">
        <div class="mt-2">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                    value="{{ $role->name }}">
                <label for="name">Role Name</label>
            </div>
        </div>
        <h3 class="text-center mb-2 text-capitalize">{{ __('Permissions') }}</h3>
        <hr class="w-75 m-auto">
        @foreach ($permission as $value)
            <div class="col-md-4 mt-2">
                <input type="checkbox" name="permission[]" data-bootstrap-switch data-off-color="danger"
                    data-on-color="success" value="{{ $value->id }}" id="{{ $value->id }}" @if (in_array($value->id, $rolePermissions)) checked @endif>
                <label for="{{ $value->id }}">{{ $value->name }}</label>
            </div>
        @endforeach
        <div class="row text-center border-top m-2">
            <button type="submit" class="btn btn-primary w-25 m-auto">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
