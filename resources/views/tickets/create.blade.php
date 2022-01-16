@extends('layouts.app')
@section('title')
    {{ __('New Maintenance Ticket') }}
@endsection
@section('pagetitle')
    {{ __('New Maintenance Ticket') }}
@endsection
@section('pagelink')
    {{ __('New Maintenance Ticket') }}
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
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="row w-100 m-auto">
                <div class="col-xs-6 col-sm-6 col-md-6 m-1 m-auto">
                    <div class="col m-auto">
                        <select class="js-example-basic-multiple w-100" name="camera_id[]" multiple='multiple'>
                            @foreach ($cameras as $camera)
                                <option value="{{ $camera->id }}">{{ $camera->code }} || {{ $camera->en_name }} ||
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
                                style="height: 100px" name="details"></textarea>
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
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
