@extends('layouts.app')
@section('title')
    {{ __('Camera Record Devices') }}
@endsection
@section('pagetitle')
    {{ __('Camera Record Devices') }}
@endsection
@section('pagelink')
    {{ __('Camera Record Devices') }}
@endsection
@section('content')
    <hr>
    @can('Record Devices Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success"
                        href="{{ route('record.devices.create') }}">{{ __('Create New Record Device') }}</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')
    <table class="table table-hover m-auto text-center">
        <tr>
            <th>#</th>
            <th>{{ __('Device') }}</th>
            <th>{{ __('Channels') }}</th>
            <th class="text-center">{{ __('Action') }}</th>
        </tr>
        @foreach ($nvrs as $nvr)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $nvr->device }}</td>
                <td class="text-capitalize">{{ $nvr->channels }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Record Devices Show')
                                <a class="dropdown-item" href="{{ route('record.devices.show', $nvr->id) }}">Show</a>
                            @endcan
                            @can('Record Devices Edit')
                                <a class="dropdown-item" href="{{ route('record.devices.edit', $nvr->id) }}">Edit</a>
                            @endcan
                            @can('Record Devices Destroy')
                                <a class="dropdown-item" href="{{ route('record.devices.destroy', $nvr->id) }}">Remove</a>
                            @endcan

                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $nvrs->links() }}
    </div>

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
