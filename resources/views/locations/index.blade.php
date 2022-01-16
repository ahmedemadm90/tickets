@extends('layouts.app')
@section('title')
    {{ __('Camera Locations') }}
@endsection
@section('pagetitle')
    {{ __('Camera Locations') }}
@endsection
@section('pagelink')
    {{ __('Camera Locations') }}
@endsection
@section('content')
<hr>
    @can('Locations Create')
        <div class="row">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('locations.create') }}"> Create New Locations</a>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')

    <table class="table table-hover m-auto text-center">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($locations as $location)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $location->location_name }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('locations.edit', $location->id) }}">Edit</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('locations.destroy', $location->id) }}">Remove</a>
                            </li>
                        </div>
                    </div>
                </td>
                {{-- <td class="text-center">
            <a class="btn btn-info" href="{{ route('role.show',$role->id) }}"><i class="fas fa-eye"></i></a>
        @can('Role Edit')
        <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}"><i class="fas fa-edit"></i></a>
        @endcan
        @can('Role Delete')
        <a class="btn btn-danger" href="{{route('role.destroy',$role->id)}}">
            <i class="fas fa-trash"></i>
        </a>
        @endcan
        </td> --}}
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $locations->links() }}
    </div>

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
