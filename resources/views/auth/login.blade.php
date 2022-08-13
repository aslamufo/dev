@extends('layouts.app')

@section('content')
<div class="container" style="padding:20px;">
    <div class="row d-flex justify-content-center shadow" style="height:60vh;">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end" hidden>{{ __('Email Address') }}</label>
                    <div class="col-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end" hidden>{{ __('Password') }}</label>

                    <div class="col-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0 ">
                    <div class="col-12" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button><br>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6" style="background-image:url({{ asset('images/pexels-josh-sorenson-1714208.jpg') }}); background-size:cover; background-repeat:no-repeat;background-position:center;">
            
        </div>

    </div>
</div>
@endsection
