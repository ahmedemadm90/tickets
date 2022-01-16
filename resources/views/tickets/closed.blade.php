@extends('layouts.app')
@section('title')
    {{ __('Closed Tickets') }}
@endsection
@section('pagetitle')
    {{ __('Closed Tickets') }}
@endsection
@section('pagelink')
    {{ __('Closed Tickets') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('page-title-desc')
    {{ __('Manage Tickets Issued') }}
@endsection
@section('content')
    <hr class="">
    <div class="row">
        @can('Tickets Create')
            <div class="col-md m-2">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('tickets.create') }}"> {{ __('Create New Ticket') }}</a>
                </div>
            </div>
            {{-- <div class="col-md">
                <form action="{{ route('tickets.closed.results') }}" class="form form-inline" method="post">
                    @csrf
                    <div class="w-75 m-auto">
                        <div class="form-floating">
                            <input type="text" class="form-control w-100" id="floatingInputGrid" name="keywords"
                                placeholder="keywords">
                            <label for="floatingInputGrid" class="fs-5">{{ __('keywords') }}</label>
                        </div>
                    </div>
                    <button class="btn btn-success fs-5" id="dashboardjson">{{ __('Search') }}</button>
                </form>
            </div> --}}
        </div>
    @endcan
    </div>
    @include('layouts.sessions')
    @include('layouts.errors')
    <table class="table table-hover m-2 text-center">
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Camera</th>
            <th>Issue Date</th>
            <th>Closed Date</th>
            <th>Closed By</th>
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
                    {{ $ticket->user->name }}
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right text-capitalize"
                            aria-labelledby="dropdownMenuButton1">
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
