@extends('layouts.app')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('title')
    {{ __('Home') }}
@endsection
@section('pagetitle')
    {{ __('Dashboard') }}
@endsection
@section('pagelink')
    {{ __('Dashboard') }}
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <hr>
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{App\Models\Ticket::where('state','open')->count()}}</h3>
                    <p>{{__('Open Tickets')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bug"></i>
                </div>
                <a href="{{route('tickets.index')}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{App\Models\Camera::where('state','online')->count()}}</h3>
                    <p>{{__('Online Cameras')}}</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-videocam"></i>
                </div>
                <a href="{{route('cameras.online')}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{App\Models\Camera::where('state','offline')->count()}}</h3>
                    <p>{{__('Offline Cameras')}}</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-videocam"></i>
                </div>
                <a href="{{route('cameras.offline')}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>
@endsection
