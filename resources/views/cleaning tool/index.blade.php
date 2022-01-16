@extends('layouts.app')
@section('title')
    {{ __('Camera Cleaning Tools') }}
@endsection
@section('pagetitle')
    {{ __('Camera Cleaning Tools') }}
@endsection
@section('pagelink')
    {{ __('Camera Cleaning Tools') }}
@endsection
@section('content')
<hr>
    @can('Cleaning Tools Create')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right m-2">
                    <a class="btn btn-success" href="{{ route('cleaning.tools.create') }}"> Add New Cleaning Tool</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')
    <table class="table table-hover m-auto text-center">
        <tr>
            <th>No</th>
            <th>{{__('Tool')}}</th>
            <th class="text-center">{{__('Action')}}</th>
        </tr>
        @foreach ($tools as $tool)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $tool->cleaning_tool }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Cleaning Tools Show')
                            <a class="dropdown-item" href="{{ route('cleaning.tools.show', $tool->id) }}">Show</a>
                            @endcan
                            @can('Cleaning Tools Edit')
                            <a class="dropdown-item" href="{{ route('cleaning.tools.edit', $tool->id) }}">Edit</a>
                            @endcan
                            @can('Cleaning Tools Destroy')
                            <a class="dropdown-item" href ="{{ route('cleaning.tools.destroy', $tool->id) }}">Remove</a>
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
