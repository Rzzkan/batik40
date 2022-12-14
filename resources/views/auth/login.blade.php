<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login BATIK 4.0</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('tema/img/logo_kecil.png') }}" type="image/png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-image: url('{{ asset('tema/img/bg_login_native_2.jpg') }}'); background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">

                <div class="col-md-12 text-center">
                    <img class="my-4" height="64px" src="{{ asset('tema/img/logo_batik_4_0_gelap.png') }}" alt="Logo">
                </div>

                <div class="card px-3">
                    <div class="card-body">

                        <a class="btn btn-flat" href="{{ route('login') }}" style="border-bottom: 2px solid; color:DodgerBlue"><strong> Login </strong></a>
                        <a class="btn btn-flat" href="{{ route('register') }}" style=" border-bottom: 2px solid white; color:gray"><strong> Daftar </strong></a>

                        <!-- <h5 class="p-2 text-center"><strong>Silakan login untuk mengakses akun anda!</strong></h5> -->

                        <form class="mt-5" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="col-md-12 col-form-label">Email</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="col-md-12 col-form-label">Password</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row mx-1">
                                    <div class="form-check col-md-4 ml-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Ingat akun saya
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                    <a class="text-right col" href="{{ route('password.request') }}">
                                        Lupa password? Klik disini!
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>