<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" @if(auth()->user()->role == 'pelanggan') data-background-color="light" @else data-background-color="blue" @endif >

        <a href="index.html" class="logo">
            @if(auth()->user()->role == 'pelanggan')
            <img style="height:38px;" src="{{ asset('tema/img/logo_batik_4_0_gelap.png') }}" alt="navbar brand" class="navbar-brand">
            @else
            <img style="height:38px;" src="{{ asset('tema/img/logo_batik_4_0.png') }}" alt="navbar brand" class="navbar-brand">
            @endif
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" @if(auth()->user()->role == 'pelanggan') data-background-color="light" @else data-background-color="blue2" @endif >

        <div class="container-fluid">
            <div class="collapse align-middle" id="search-nav">
                <h5 class="text-light mt-2 @if(auth()->user()->role == 'pelanggan') text-dark @endif">Selamat datang <strong>{{ auth()->user()->name }}</strong>, selamat beraktifitas!</h5>
            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{ asset('tema/img/profile.png') }}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="{{ asset('tema/img/profile.png') }}" alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <p class="text-muted">{{ auth()->user()->email }}</p>
                                        <a href="{{ route('pengelola.edit', auth()->user()->id) }}" class="btn btn-xs btn-secondary btn-sm">Ubah Profil</a>
                                        <a class="btn btn-xs btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>

                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>