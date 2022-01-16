@extends('layouts.app')
@section('title')
    Ticket {{ $ticket->id }}
@endsection
@section('pagetitle')
    {{ __('Ticket') }} || <span class="text-danger">{{ $ticket->id }}</span>
@endsection
@section('pagetitle')
    {{ __('Ticket') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    @can('Tickets List')
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary" @if ($ticket->state == 'closed')
                    href="{{ route('tickets.closed.index') }}"
                @else
                    href="{{ route('tickets.index') }}"

                    @endif>{{ __('Back') }}</a>
            </div>
        </div>
    @endcan
    <hr>
    @include('layouts.errors')
    @include('layouts.sessions')
    <nav class="text-capitalize">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab"
                aria-controls="nav-details" aria-selected="true">details</a>
            <a class="nav-item nav-link" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab"
                aria-controls="nav-gallery" aria-selected="false">gallery</a>
            <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab"
                aria-controls="nav-comments" aria-selected="false">comments</a>
            @if ($ticket->state == 'open')
                @can('Tickets Comment')
                    <a class="nav-item nav-link" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab"
                        aria-controls="nav-comment" aria-selected="false">comment</a>
                @endcan
            @endif
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
            <div class="container w-50 mt-5">
                <p class="cot-md-6 m-auto fs-4">Ticket No : <span class="text-primary">{{ $ticket->id }}</p></span>
                <p class="cot-md-6 m-auto fs-4">Camera En Name : <span
                        class="text-primary">{{ $ticket->camera($ticket->camera_id)->en_name }}</p></span>
                <p class="cot-md-6 m-auto fs-4">Camera AR Name : <span
                        class="text-primary">{{ $ticket->camera($ticket->camera_id)->ar_name }}</p></span>
                <p class="cot-md-6 m-auto fs-4">Camera Code : <span
                        class="text-primary">{{ $ticket->camera($ticket->camera_id)->code }}</p></span>
                <p class="cot-md-6 m-auto fs-4">Camera Recording Device :
                    <span class="text-primary">{{ $ticket->camera($ticket->camera_id)->device->device }}</span>
                </p>

            </div>
            @if ($ticket->state == 'open')
                @can('Tickets Close')
                    <a class="btn btn-danger" href="{{ route('tickets.close', $ticket->id) }}">Close</a>
                @endcan
            @else
                <p class="badge bg-danger fs-2 mt-3 p-2">
                    This Ticket Was Closed
                </p>
            @endif
        </div>
        @if ($ticket->camera($ticket->camera_id)->gallery)
            <div class="tab-pane fade" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                <div id="carouselExampleControls" class="carousel slide text-center w-50 m-auto" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($ticket->camera($ticket->camera_id)->gallery as $img)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src='{{ asset("media/cameras/images/$img") }}' class="w-75"
                                    height="300px">
                            </div>
                        @endforeach
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="tab-pane fade" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                <p class="text-danger fs-1">{{__('No Images Available')}}</p>
            </div>
        <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
            <table class="table table-hover text-center">
                <tr>
                    <td class="col-md-4">Comment</td>
                    <td class="col-md-4">User</td>
                    <td class="col-md-4">Date</td>
                </tr>
                @foreach (App\Models\TicketComment::where('ticket_id', $ticket->id)->get() as $comment)
                    <tr>
                        <td class="col-md-4">{{ $comment->comment }}</td>
                        <td class="col-md-4">{{ $comment->user->name }}</td>
                        <td class="col-md-4">{{ $comment->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        @if ($ticket->state = 'open')
            @can('Tickets Comment')
                <div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
                    <div class="row text-left m-auto p-1">
                        <form action="{{ route('tickets.comment', $ticket->id) }}" class="mt-5" method="POST">
                            @csrf
                            <div class="col-md-6 m-auto">
                                <div class="form-floating ">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px" name="comment"></textarea>
                                    <label for="floatingTextarea2">Comments</label>
                                </div>
                            </div>
                            <div class="col-md-6 m-auto text-center">
                                <button class="btn btn-success mt-2">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            @endcan
        @endif
    </div>
@endsection
