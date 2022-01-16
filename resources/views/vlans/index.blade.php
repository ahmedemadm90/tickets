@extends('layouts.app')
@section('title')
    {{ __('Camera Vlans') }}
@endsection
@section('pagetitle')
    {{ __('Camera Vlans') }}
@endsection
@section('pagelink')
    {{ __('Camera Vlans') }}
@endsection
@section('content')
<hr>
    @can('Vlans Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('vlans.create') }}"> Create New Vlan</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')

    <table class="table table-hover m-auto text-center">
        <tr>
            <th>#</th>
            <th>{{ __('Vlan') }}</th>
            <th>{{ __('Dispatch') }}</th>
            <th>{{ __('Start IP') }}</th>
            <th>{{ __('End IP') }}</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($vlans as $vlan)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $vlan->vlan_name }}</td>
                <td class="text-capitalize">{{ $vlan->dispatch->name }}</td>
                <td class="text-capitalize">{{ $vlan->start_ip }}</td>
                <td class="text-capitalize">{{ $vlan->end_ip }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Vlans Show')
                                <a class="dropdown-item" href="{{ route('vlans.show', $vlan->id) }}">Show</a>

                            @endcan
                            @can('Vlans Edit')
                                <a class="dropdown-item" href="{{ route('vlans.edit', $vlan->id) }}">Edit</a>
                            @endcan
                            @can('Vlans Destroy')
                                <a class="dropdown-item" href="{{ route('vlans.destroy', $vlan->id) }}">Remove</a>
                            @endcan

                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $vlans->links() }}
    </div>

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
