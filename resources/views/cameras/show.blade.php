@extends('layouts.app')
@section('title')
    {{ $camera->en_name }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <nav class="text-capitalize">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab"
                aria-controls="nav-details" aria-selected="true">details</a>
            <a class="nav-item nav-link" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab"
                aria-controls="nav-gallery" aria-selected="false">gallery</a>
            <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-history" role="tab"
                aria-controls="nav-history" aria-selected="false">history</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
            <div class="container w-50 mt-5">
                <p class="cot-md-6 m-auto fs-4">Camera En Name : <span class="text-primary">{{ $camera->en_name }}</p>
                </span>
                <p class="cot-md-6 m-auto fs-4">Camera AR Name : <span class="text-primary">{{ $camera->ar_name }}</p>
                </span>
                <p class="cot-md-6 m-auto fs-4">Camera Code : <span class="text-primary">{{ $camera->code }}</p></span>
                <p class="cot-md-6 m-auto fs-4">Camera Recording Device :
                    <span class="text-primary">{{ $camera->device->device }}</span>
                </p>

            </div>
        </div>
        @if ($camera->gallery)
            <div class="tab-pane fade" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                <div id="carouselExampleControls" class="carousel slide text-center w-50 m-auto" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($camera->gallery as $img)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src='{{ asset("media/cameras/images/$img") }}' class="w-75" height="300px">
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
            <p class="text-danger fs-1">{{ __('No Images Available') }}</p>
        </div>
        <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
            <table class="table table-hover m-2 text-center">
        <tr>
            <th>No</th>
            <th>State</th>
            <th>Issue Date</th>
            <th>Action</th>
        </tr>
        @foreach (App\Models\Ticket::where('camera_id',$camera->id)->get() as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td class="text-capitalize">
                    @if ($ticket->state == 'open')
                        <p class="badge bg-success text-capitalize">{{ $ticket->state }}</p>
                    @else
                        <p class="badge bg-danger text-capitalize">{{ $ticket->state }}</p>
                    @endif
                </td>
                <td class="text-capitalize">
                    {{ $ticket->created_at->diffForHumans() }}
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

                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
        </div>
    </div>
@endsection
