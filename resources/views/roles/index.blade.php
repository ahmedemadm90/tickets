@extends('layouts.app')
@section('title')
    {{__('CLM || Roles List')}}
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
            @can('Roles Create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
    <hr>
    @include('layouts.sessions')
    <table class="table table-hover text-center">
        <tr>
            <th>#</th>
            <th>{{__('Role Name')}}</th>
            <th>{{__('Action')}}</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info m-auto" href="{{ route('roles.show', $role->id) }}"><i
                            class="fas fa-eye"></i></a>
                    @can('Roles Edit')
                        <a class="btn btn-primary m-auto" href="{{ route('roles.edit', $role->id) }}"><i
                                class="fas fa-edit"></i></a>
                    @endcan
                    @can('Roles Destroy')
                        {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!} --}}
                        <a class="btn btn-danger m-auto" href="{{ route('roles.destroy', $role->id) }}"><i
                                class="fas fa-minus-circle"></i>
                        </a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {!! $roles->render() !!}

@endsection
@section('pagetitle')
    <div class="pull-left mt-2">
            <h2>Role Management</h2>
        </div>
@endsection
@section('pagelink')
    Role Management
@endsection
