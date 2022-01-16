@extends('layouts.app')
@section('title')
    {{ __('Camera Regions') }}
@endsection
@section('pagetitle')
    {{ __('Camera Regions') }}
@endsection
@section('pagelink')
    {{ __('Camera Regions') }}
@endsection
@section('content')
<hr>
    @can('Regions Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('regions.create') }}">{{ __('Create New Regi') }}on</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')

    <table class="table table-hover m-auto text-center">
        <tr>
            <th>{{ __('No') }}</th>
            <th>{{ __('Name') }}</th>
            <th class="text-center">{{ __('Action') }}</th>
        </tr>
        @foreach ($regions as $region)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $region->region_name }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Regions Show')
                                <a class="dropdown-item" href="{{ route('regions.show', $region->id) }}">Show</a>
                            @endcan
                            @can('Regions Edit')
                                <a class="dropdown-item" href="{{ route('regions.edit', $region->id) }}">Edit</a>
                            @endcan
                            @can('Regions Destroy')
                                <a class="dropdown-item" href="{{ route('regions.destroy', $region->id) }}">Destroy</a>
                            @endcan
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $regions->links() }}
    </div>

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pageheader')
    @include('layouts.pageheader')
@endsection
@section('pageheader_title')
    {{ __('Regions') }}
@endsection
@section('pageheader_link')
    {{ __('Regions') }}
@endsection
