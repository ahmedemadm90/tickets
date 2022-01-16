@extends('layouts.app')
@section('title')
    {{ __('Open Tickets Search Results') }}
@endsection
@section('pagetitle')
    {{ __('Open Tickets Search Results') }}
@endsection
@section('pagelink')
    {{ __('Open Tickets Search Results') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('page-title-desc')
    {{ __('Open Tickets Search Results') }}
@endsection
@section('content')
    <hr class="">
    @can('Tickets Closed')
        <div class="row">
            <div class="col-lg-12 m-2">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('tickets.index') }}"> {{ __('Back') }}</a>
                </div>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')
    @include('layouts.errors')
    <table class="table table-hover m-2 text-center">
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Camera</th>
            <th>Issue Date</th>
            <th>Closed Date</th>
            <th>Action</th>
        </tr>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $ticket->camera($ticket->camera_id)->code }}</td>
                <td>{{ $ticket->camera($ticket->camera_id)->en_name }}</td>
                <td>
                    {{ $ticket->created_at->diffForHumans() }}
                </td>
                <td>
                    {{ $ticket->updated_at->diffForHumans() }}
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Tickets Show')
                                <a class="dropdown-item" href="{{ route('tickets.show', $ticket->id) }}">Show</a>
                            @endcan
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center m-2">
        {{ $tickets->links() }}
    </div>
@endsection
