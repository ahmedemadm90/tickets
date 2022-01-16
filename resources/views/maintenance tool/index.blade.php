@extends('layouts.app')
@section('title')
    {{ __('Camera Maintenance Tools') }}
@endsection
@section('pagetitle')
    {{ __('Camera Maintenance Tools') }}
@endsection
@section('pagelink')
    {{ __('Camera Maintenance Tools') }}
@endsection
@section('content')
    @can('Maintenance Tools Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('maintenance.tools.create') }}"> Add New Maintenance Tool</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')

    <table class="table table-hover m-auto text-center">
        <tr>
            <th>No</th>
            <th>Tool</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($tools as $tool)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $tool->maintenance_tool }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Maintenance Tools Show')
                                <a class="dropdown-item" href="{{ route('maintenance.tools.show', $tool->id) }}">Show</a>
                            @endcan
                            @can('Maintenance Tools Edit')
                                <a class="dropdown-item" href="{{ route('maintenance.tools.edit', $tool->id) }}">Edit</a>
                            @endcan
                            @can('Maintenance Tools Destroy')
                                <a class="dropdown-item" href="{{ route('maintenance.tools.destroy', $tool->id) }}">Remove</a>
                            @endcan
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $tools->links() }}
    </div>

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
