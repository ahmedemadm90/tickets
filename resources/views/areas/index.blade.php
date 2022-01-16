@extends('layouts.app')
@section('title')
    {{ __('Camera Areas') }}
@endsection
@section('pagetitle')
    {{ __('Camera Areas') }}
@endsection
@section('pagelink')
    {{ __('Camera Areas') }}
@endsection
@section('content')
<hr>
    @can('Areas Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('areas.create') }}"> Create New Area</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')

    <table class="table table-hover m-auto text-center">
        <tr>
            <th>No</th>
            <th>Area Name</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($areas as $area)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $area->area_name }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton">
                            @can('Areas Edit')
                            <li><a class="dropdown-item" href="{{ route('areas.edit', $area->id) }}">Edit</a></li>
                            @endcan
                            @can('Areas Destroy')
                            <li><a class="dropdown-item" href="{{ route('areas.destroy', $area->id) }}">Remove</a></li>
                            @endcan
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $areas->links() }}
    </div>
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
