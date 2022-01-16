@extends('layouts.app')
@section('title')
    {{ __('Camera Operation States') }}
@endsection
@section('pagetitle')
    {{ __('Camera Operation States') }}
@endsection
@section('pagelink')
    {{ __('Camera Operation States') }}
@endsection
@section('content')
    @can('Operational State Create')
        <div class="row">
            <div class="pull-right m-2">
                <a class="btn btn-success" href="{{ route('op.states.create') }}"> {{ __('Add New State') }}</a>
            </div>
        </div>
    @endcan
    @include('layouts.sessions')

    <table class="table table-hover m-auto text-center">
        <tr>
            <th>No</th>
            <th>States Available</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($states as $state)

            <tr>
                <td>{{ ++$i }}</td>
                <td class="text-capitalize">{{ $state->state }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('op.states.edit', $state->id) }}">Edit</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('op.states.destroy', $state->id) }}">Remove</a>
                            </li>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center m-2">
        {{ $states->links() }}
    </div>

@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
