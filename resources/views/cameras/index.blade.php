@extends('layouts.app')
@section('title')
    {{ __('All Cameras') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('pagetitle')
    {{ __('Cameras Management') }}
@endsection
@section('pagelink')
    {{ __('Cameras Management') }}
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    @include('layouts.sessions')
    <div class="row">
        <div class="col-md">
            <a class="btn btn-success text-capitalize col-md-3"
                href="{{ route('cameras.create') }}">{{ __('new camera') }}</a>
        </div>
        <div class="col-md">
            <form action="{{ route('findcams') }}" class="form form-inline" method="post">
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
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-hover text-capitalize text-center">
            <thead>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Ar Name') }}</th>
                    <th>{{ __('IP') }}</th>
                    <th>{{ __('State') }}</th>
                    <th>{{ __('Record Device') }}</th>
                    <th>{{ __('Last Ping Process') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody id="">
                @foreach ($cams as $cam)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td class="text-capitalize">{{ $cam->code }}</td>
                        <td class="text-capitalize">{{ $cam->en_name }}</td>
                        <td class="text-capitalize">{{ $cam->ar_name }}</td>
                        <td class="text-capitalize">{{ $cam->ip }}</td>
                        <td class="text-capitalize">
                            @if ($cam->state == 'online')
                                <span class="badge bg-success text-capitalize">online</span>
                            @else
                                <span class="badge bg-danger text-capitalize">offline</span>
                            @endif
                        </td>
                        <td class="text-capitalize">{{ $cam->device->device }}</td>
                        <td class="text-capitalize">
                            @if (isset($cam->updated_at))
                                <span class="badge bg-success">{{ $cam->updated_at->diffForHumans() }}</span>
                            @else
                                <span class="badge bg-danger">{{ __('Not Yet Tested') }}</span>
                            @endif
                        </td>

                        <td>
                            <div class="dropdown text-center">
                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right text-capitalize"
                                    aria-labelledby="dropdownMenuButton1">
                                    @can('Cameras Show')
                                        <a href="{{ route('cameras.show', $cam->id) }}"
                                            class="dropdown-item">{{ __('Show') }}</a>

                                    @endcan
                                    @can('Cameras Edit')
                                        <a href="{{ route('cameras.edit', $cam->id) }}"
                                            class="dropdown-item">{{ __('Edit') }}</a>

                                    @endcan
                                    @can('Cameras Destroy')
                                        <a href="{{ route('cameras.destroy', $cam->id) }}"
                                            class="dropdown-item">{{ __('Delete') }}</a>
                                    @endcan

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <div class="d-flex justify-content-center m-2">
    {{ $cams->links() }}
</div> --}}
@endsection
