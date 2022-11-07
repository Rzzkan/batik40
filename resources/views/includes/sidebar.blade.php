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

            <ul class="nav @if(auth()->user()->role == 'pelanggan') nav-warning @else nav-primary @endif">
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

                @if(auth()->user()->role=='super_admin' || auth()->user()->role=='pengelola')

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

                <li class="nav-item @if($title == 'Status Transaksi') active @endif ">
                    <a href="{{ route('status_transaksi.index') }}">
                        <i class="fas fa-sliders-h"></i>
                        <p>Status Transaksi</p>
                    </a>
                </li>

                @endif

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

                @if(auth()->user()->role=='pelanggan')

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pelanggan</h4>
                </li>

                <li class="nav-item @if($title == 'Alamat') active @endif ">
                    <a href="{{ route('alamat.index') }}">
                        <i class="fas fa-map-marked-alt"></i>
                        <p>Alamat</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Panduan' || 
                $title == 'Motif Dasar' || 
                $title == 'Panduan' || 
                $title == 'Hasil Desain') active @endif ">
                    <a data-toggle="collapse" href="#customer">
                        <i class="fas fa-clipboard-check"></i>
                        <p>Customer</p>
                        <span class="caret"></span>
                    </a>

                    <div class="collapse @if($title == 'Panduan' || 
                $title == 'Motif Dasar' || 
                $title == 'Panduan' || 
                $title == 'Hasil Desain') show @endif " id="customer">
                        <ul class="nav nav-collapse">
                            <li class="@if($title == 'Panduan') active @endif ">
                                <a href="{{ route('panduan.index') }}">
                                    <span class="sub-item">Panduan</span>
                                </a>
                            </li>
                            <li class="@if($title == 'Motif Dasar') active @endif ">
                                <a href="{{ route('motif.index') }}">
                                    <span class="sub-item">Motif Dasar</span>
                                </a>
                            </li>
                            <li class="@if($title == 'Pelanggan') active @endif ">
                                <a href="#">
                                    <span class="sub-item">Buat Desain</span>
                                </a>
                            </li>
                            <li class="@if($title == 'Hasil Desain') active @endif ">
                                <a href="{{ route('hasil_desain.index') }}">
                                    <span class="sub-item">Hasil</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item @if($title == 'Keranjang') active @endif ">
                    <a href="{{ route('keranjang.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Keranjang</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Transaksi') active @endif ">
                    <a href="{{ route('transaksi.index') }}">
                        <i class="fas fa-hourglass-half"></i>
                        <p>Transaksi</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Bantuan</h4>
                </li>

                <li class="nav-item @if($title == 'Happy Customer') active @endif ">
                    <a href="{{ route('review.index') }}">
                        <i class="far fa-star"></i>
                        <p>Happy Customer</p>
                    </a>
                </li>

                <li class="nav-item @if($title == 'Customer Service') active @endif ">
                    <a href="#">
                        <i class="fas fa-sliders-h"></i>
                        <p>Customer Service</p>
                    </a>
                </li>

                @endif
            </ul>
        </div>
    </div>
</div>