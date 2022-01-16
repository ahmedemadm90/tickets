@extends('layouts.app')
@section('title')
    {{ __('Camera Maintenance Category') }}
@endsection
@section('pagetitle')
    {{ __('Camera Maintenance Categories') }}
@endsection
@section('pagelink')
    {{ __('Camera Maintenance Categories') }}
@endsection
@section('content')
<hr>
    @can('Maintenance Categories Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('maintenance.category.create') }}"> {{__('Add New Maintenance
                        Category')}}</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.errors')
    @include('layouts.sessions')
    <table class="table table-hover m-auto text-center">
        <tr>
            <th>#</th>
            <th>{{ __('Maintenance Category') }}</th>
            <th class="text-center">{{ __('Action') }}</th>
        </tr>
        @foreach ($cats as $cat)
            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $cat->maintenance_category }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Maintenance Categories Show')
                            <a class="dropdown-item" href="{{ route('maintenance.category.show', $cat->id) }}">Show</a>
                            @endcan
                            @can('Maintenance Categories Edit')
                            <a class="dropdown-item" href="{{ route('maintenance.category.edit', $cat->id) }}">Edit</a>
                            @endcan
                            @can('Maintenance Categories Destroy')
                            <a class="dropdown-item"href="{{ route('maintenance.category.destroy', $cat->id) }}">Remove</a>
                            @endcan
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $cats->links() }}
    </div>

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
