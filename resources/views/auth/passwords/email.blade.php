@extends('layouts.forms')
@section('title')
    CLM || Forget My Password
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <label for="email" class="col-md col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                    <div class="form-group row">

                        <div class="col-md">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row text-center">
                        <div class="col-md m-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
