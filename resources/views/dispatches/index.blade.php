@extends('layouts.app')
@section('title')
    {{ __('Camera Dispatches') }}
@endsection
@section('pagetitle')
    {{ __('Camera Dispatches') }}
@endsection
@section('pagelink')
    {{ __('Camera Dispatches') }}
@endsection
@section('content')
    @can('Dispatches Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('dispatches.create') }}"> Create New Dispatch</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')

    <table class="table table-hover m-auto text-center">
        <tr>
            <th>No</th>
            <th>Switch Name</th>
            <th>Ports</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($dispatches as $dispatch)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $dispatch->name }}</td>
                <td class="text-capitalize">{{ $dispatch->ports }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="{{ route('dispatches.edit', $dispatch->id) }}">Edit</a>
                            <a class="dropdown-item" href="{{ route('dispatches.destroy', $dispatch->id) }}">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $dispatches->links() }}
    </div>

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
