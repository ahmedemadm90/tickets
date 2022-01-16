@extends('layouts.app')
@section('title')
    CEMEX || New User
@endsection
@section('pagetitle')
    {{ __('Create New User') }}
@endsection
@section('pagelink')
    {{ __('Create New User') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    @can('Users List')
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    @endcan
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
    <hr>
    <form class="form-floating text-center m-auto text-capitalize w-75" action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row m-auto p-1">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name">
                    <label for="floatingInputGrid">{{ __('name') }}</label>
                </div>
            </div>
            <div class="col m-auto">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="user email" name="email">
                    <label for="floatingInput">{{ __('email') }}</label>
                </div>
            </div>

        </div>
        <div class="row m-auto p-1">
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput" placeholder="user password"
                        name="password">
                    <label for="floatingInput">{{ __('password') }}</label>
                </div>
            </div>
            <div class="col-md m-auto">
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput" placeholder="confirm-password"
                        name="confirm-password">
                    <label for="floatingInput">{{ __('confirm-password') }}</label>
                </div>
            </div>
        </div>
        <div class="form-switch col-md text-capitalize m-auto fs-2">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="1">
            <label class="form-check-label" for="flexSwitchCheckChecked">{{ __('Active') }}</label>
        </div>
        <hr class="w-100 p-1">
        <div class="col-md m-auto text-center">
            <h2>{{ __('Roles') }}</h2>
            @foreach ($roles as $role)
                <div class="form-switch col-md-3 text-capitalize m-auto">
                    <input class="form-check-input" type="checkbox" id="{{ $role }}" name="roles[]"
                        value="{{ $role }}">
                    <label class="form-check-label" for="{{ $role }}">{{ $role }}</label>
                </div>
            @endforeach
        </div>
        {{--  --}}
        <hr class="w-100 p-1">
        <div class="col m-auto">
            <div class="form-floating m-2">
                <button class="btn btn-success text-capitalize">{{ __('Submit') }}</button>
            </div>
        </div>
    </form>
@endsection
