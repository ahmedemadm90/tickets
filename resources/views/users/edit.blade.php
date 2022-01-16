@extends('layouts.app')
@section('title')
Edit User
@endsection
@section('navbar')
@include('layouts.navbar')
@endsection
@section('sidebar')
@include('layouts.sidebar')
@endsection

@section('content')
<hr class="">
@include('layouts.sessions')
<form class="form-floating w-75 m-auto" method="post" action="{{route('users.update',$user->id)}}">
    @csrf
    <div class="row m-2">
        <div class="col-md m-auto text-capitalize">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name"
                    value="{{$user->name}}">
                <label for="floatingInputGrid">{{__('name')}}</label>
            </div>
        </div>
        <div class="col-md m-auto text-capitalize">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name" name="email"
                    value="{{$user->email}}">
                <label for="floatingInputGrid">{{__('email')}}</label>
            </div>
        </div>

    </div>
    <div class="row m-2">
        <div class="col-md m-auto text-capitalize">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="password" name="password"
                    value="">
                <label for="floatingInputGrid">{{__('password')}}</label>
            </div>
        </div>
        <div class="col-md m-auto text-capitalize">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="confirm password"
                    name="confirm-password" value="">
                <label for="floatingInputGrid">{{__('confirm password')}}</label>
            </div>
        </div>
    </div>
    <div class="form-switch col-md text-capitalize text-center m-auto fs-2">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="1" @if ($user->active == 1)
                checked
            @endif>
            <label class="form-check-label" for="flexSwitchCheckChecked">{{ __('Active') }}</label>
        </div>
    <hr class="p-1">
    <div class="row m-3">
        <h2 class="text-center">Roles</h2>
        @foreach($roles as $role)
        <div class="form-check form-check-inline form-switch col-md-3 text-capitalize m-auto">
            <input class="form-check-input" type="checkbox" id="{{$role}}" name="roles[]" value="{{$role}}"
                @if (in_array($role,$userRole)) checked @endif>
            <label class="form-check-label" for="{{$role}}">{{$role}}</label>
        </div>
        @endforeach
    </div>
    <hr class="p-1">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
