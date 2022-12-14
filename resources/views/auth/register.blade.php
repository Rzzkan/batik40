<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register BATIK 4.0</title>
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

                <div class="card px-3 mb-5">
                    <div class="card-body">

                        <a class="btn btn-flat" href="{{ route('login') }}" style="border-bottom: 2px solid white; color:gray"><strong> Login </strong></a>
                        <a class="btn btn-flat" href="{{ route('register') }}" style=" border-bottom: 2px solid; color:DodgerBlue"><strong> Daftar </strong></a>
                        <hr>
                        <!-- <h5 class="p-2 text-center"><strong>Silakan login untuk mengakses akun anda!</strong></h5> -->

                        <form class="mt-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                </strong><label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="col-md-4 col-form-label text-md-end">No. Hp</label>

                                <div class="col-md-12">
                                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp">

                                    @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Ulangi Password</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Register
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