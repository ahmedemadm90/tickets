@extends('layouts.app')
@section('title')
{{ __('Camera Segments') }}
@endsection
@section('pagetitle')
    {{ __('Camera Segments') }}
@endsection
@section('content')
    @can('Segments Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('segments.create') }}"> Create New Segment</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')

    <table class="table table-hover m-auto text-center">
        <tr>
            <th>No</th>
            <th>Segment</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($segments as $segment)
            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $segment->segment_name }}</td>
                <td>
                    {{-- <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('segments.edit',$segment->id) }}">Edit</a></li>
                    <li><a class="dropdown-item" href="{{ route('segments.destroy',$segment->id) }}">Remove</a></li>
                </ul>
            </div> --}}
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            @can('Segments Edit')
                            <a class="dropdown-item" href="{{ route('segments.edit',$segment->id) }}">Edit</a>
                            @endcan
                            @can('Segments Destroy')
                            <a class="dropdown-item" href="{{ route('segments.destroy',$segment->id) }}">Remove</a>
                            @endcan
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center m-2">
        {{ $segments->links() }}
    </div>
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
