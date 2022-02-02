@extends('layouts.app')
@section('title')
{{__('Manage Users')}}
@endsection
@section('pagetitle')
    {{ __('Manage Users') }}
@endsection
@section('pagelink')
    {{ __('Manage Users') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
@include('layouts.sidebar')
@endsection

@section('content')
<hr class="">
@can('Users Create')
<div class="row">
    <div class="col-lg-12 m-2">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> {{__('Manage Users')}}</a>
        </div>
    </div>
</div>
@endcan
@if ($message = Session::get('success'))
<div class="alert alert-success m-2">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-hover m-2 text-center">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th>State</th>

        <th>Action</th>
    </tr>
    @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
            <label class="badge bg-success text-capitalize">{{ $v }}</label>
            @endforeach
            @endif
        </td>
        <td class="text-capitalize">
            @if ($user->active == 1)
            <label for="" class="badge bg-success text-capitalize">{{__('active')}}</label>
            @else
            <label for="" class="badge bg-danger text-capitalize">{{__('Disabled')}}</label>
            @endif
        </td>
        {{-- <td class="text-capitalize">
            <label for=""
                class="badge bg-info text-capitalize">{{$user->group->group_name ?? 'User Is Not In Any Groups'}}</label>
        </td> --}}
        <td>
            <div class="dropdown">
                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-capitalize dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                    @can('Users Show')
                    <li><a class="dropdown-item" href="{{ route('users.show',$user->id) }}">Show</a></li>
                    @endcan
                    @can('Users Edit')
                    <li><a class="dropdown-item" href="{{ route('users.edit',$user->id) }}">Edit</a></li>
                    @endcan
                    @can('Users Destroy')
                    <li><a class="dropdown-item" href="{{ route('users.destroy',$user->id) }}">Remove</a></li>
                    @endcan
                </ul>
            </div>
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex justify-content-center m-2">
    {{ $data->links() }}
</div>
@endsection
