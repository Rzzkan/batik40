<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('tema/img/profile.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->name }}
                            <span class="user-level">{{ auth()->user()->role }}</span>
                            <!-- <span class="caret"></span> -->
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>

            <ul class="nav nav-primary">
                <li class="nav-item @if($title == 'Dashboard') active @endif ">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <!-- <span class="caret"></span> -->
                    </a>
                </li>

                @if(auth()->user()->role=='super_admin')

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Kelola Data</h4>
                </li>

                <li class="nav-item @if($title == 'Mesin') active @endif ">
                    <a href="{{ route('mesin.index') }}">
                        <i class="far fa-hdd"></i>
                        <p>Mesin</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Warna') active @endif ">
                    <a href="{{ route('warna.index') }}">
                        <i class="fas fa-palette"></i>
                        <p>Warna</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Teknik') active @endif ">
                    <a href="{{ route('teknik.index') }}">
                        <i class="fas fa-fill-drip"></i>
                        <p>Teknik Pewarnaan</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Kain') active @endif ">
                    <a href="{{ route('kain.index') }}">
                        <i class="fas fa-paperclip"></i>
                        <p>Kain (Per 1m x 1m)</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Proses') active @endif ">
                    <a href="{{ route('proses.index') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Jenis Proses</p>
                    </a>
                </li>

                @endif

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Kelola Pesanan</h4>
                </li>

                <li class="nav-item @if($title == 'Validasi Harga') active @endif ">
                    <a href="{{ route('validasi.index') }}">
                        <i class="fas fa-clipboard-check"></i>
                        <p>Validasi Harga</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Antrian') active @endif ">
                    <a href="{{ route('antrian.index') }}">
                        <i class="fas fa-clone"></i>
                        <p>Antrian Produksi</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Proses Produksi') active @endif ">
                    <a href="{{ route('produksi.index') }}">
                        <i class="fas fa-hourglass-half"></i>
                        <p>Proses Produksi</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Status Mesin') active @endif ">
                    <a href="{{ route('status_mesin.index') }}">
                        <i class="fas fa-sliders-h"></i>
                        <p>Status Mesin</p>
                    </a>
                </li>

                @if(auth()->user()->role=='super_admin')

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Pengguna</h4>
                </li>

                <li class="nav-item @if($title == 'Pengelola') active @endif ">
                    <a href="{{ route('pengelola.index') }}">
                        <i class="fas fa-users-cog"></i>
                        <p>Admin Pengelola</p>
                        <!-- <span class="badge badge-success">4</span> -->
                    </a>
                </li>

                <li class="nav-item @if($title == 'Pelanggan') active @endif ">
                    <a href="{{ route('pelanggan.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>

                @endif
            </ul>
        </div>
    </div>
</div>