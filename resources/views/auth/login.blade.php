@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">

            <div class="card">
                <div class="card-header">
                    <h5 class="p-2 text-center"><strong>Silakan login untuk mengakses akun anda!</strong></h5>
                </div>

                <div class="card-body">

                    <div class="col-md-12 text-center">
                        <img class="my-5" height="64px" src="{{ asset('tema/img/logo_batik_4_0_gelap.png') }}" alt="Logo">
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Ingat akun saya
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa password? Klik disini!
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <hr>

                    <div class="row text-center">
                        <div class="col-md-6">
                            @if (Route::has('login'))
                            <a class="col-12 btn btn-secondary" href="{{ route('login') }}">Login</a>
                            @endif
                        </div>

                        <div class="col-md-6">
                            @if (Route::has('register'))
                            <a class="col-12 btn btn-secondary" href="{{ route('register') }}">Register</a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection