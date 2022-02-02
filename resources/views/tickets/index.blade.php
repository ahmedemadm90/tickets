@extends('layouts.app')
@section('title')
    {{ __('Open Tickets') }}
@endsection
@section('pagetitle')
    {{ __('Open Tickets') }}
@endsection
@section('pagelink')
    {{ __('Open Tickets') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <hr class="">
    <div class="row">
        <div class="col-md m-2">
            @can('Tickets Create')
            <a class="btn btn-success" href="{{ route('tickets.create') }}"> {{ __('Create New Ticket') }}</a>
            @endcan
            @can('Export Open Tickets')
            <a class="btn btn-info" href="{{ route('tickets.open.export') }}"> {{ __('Export Open Tickets') }}</a>
            @endcan
            @can('Export All Tickets')
            <a class="btn btn-info" href="{{ route('tickets.all.export') }}"> {{ __('Export All Tickets') }}</a>
            @endcan
        </div>
    </div>
    @include('layouts.sessions')
    @include('layouts.errors')
    <table class="table table-hover m-2 text-center">
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Camera</th>
            <th>State</th>
            <th>Issue Date</th>
            <th>Action</th>
        </tr>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $ticket->camera($ticket->camera_id)->code }}</td>
                <td>{{ $ticket->camera($ticket->camera_id)->en_name }}</td>

                <td class="text-capitalize">
                    @if ($ticket->state == 'open')
                        <p class="badge bg-success text-capitalize">{{ $ticket->state }}</p>
                    @else
                        <p class="badge bg-danger text-capitalize">{{ $ticket->state }}</p>
                    @endif
                </td>
                <td class="text-capitalize">
                    {{ $ticket->created_at}}
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            @can('Tickets Show')
                                <a class="dropdown-item dropdown-menu-right"
                                    href="{{ route('tickets.show', $ticket->id) }}">Show</a>
                            @endcan

                            @can('Tickets Edit')
                                <a class="dropdown-item" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
                            @endcan
                            @can('Tickets Destroy')
                                <a class="dropdown-item" href="{{ route('tickets.destroy', $ticket->id) }}">Remove</a>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Select a state",
            });
        });
    </script>
@endsection
