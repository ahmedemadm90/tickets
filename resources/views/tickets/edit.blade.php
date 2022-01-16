@extends('layouts.app')
@section('title')
    {{ __('Edit Maintenance Ticket') }} || {{ $ticket->id }}
@endsection
@section('pagetitle')
    {{ __('Edit Maintenance Ticket') }}
@endsection
@section('pagelink')
    {{ __('Edit Maintenance Ticket') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <hr>
    @include('layouts.errors')
    @include('layouts.sessions')
    @can('Tickets List')
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tickets.index') }}">{{ __('Back') }}</a>
            </div>
        </div>
    @endcan
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="row w-100 m-auto">
                <div class="col-xs-6 col-sm-6 col-md-6 m-1 m-auto">
                    <div class="col m-auto">
                        <select class="form-select js-example-basic-single w-100 p-2" name="camera_id">
                            @foreach ($cameras as $camera)
                                <option value="{{ $camera->id }}" class="p-2" @if ($ticket->camera_id == $camera->id)
                                    selected
                                @endif>{{ $camera->code }} || {{ $camera->en_name }} ||
                                    {{ $camera->ar_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row w-100 m-auto">
                <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
                    <div class="col">
                        <div class="form-floating mt-2">
                            <textarea class="form-control" placeholder="Ticket Details" id="floatingTextarea2"
                                style="height: 100px" name="details">{{ $ticket->details }}</textarea>
                            <label for="floatingTextarea2">Ticket Details</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
