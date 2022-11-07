@extends('layouts.default')
@section('content')

@if(auth()->user()->role!='pelanggan')
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="far fa-hdd"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category"><strong>Mesin</strong></p>
                                <h4 class="card-title">{{ $jumlah_mesin }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-palette"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category"><strong>Warna</strong></p>
                                <h4 class="card-title">{{ $jumlah_warna }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-fill-drip"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category"><strong>Teknik Pewarnaan</strong></p>
                                <h4 class="card-title">{{ $jumlah_teknik }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fas fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category"><strong>Kain</strong></p>
                                <h4 class="card-title">{{ $jumlah_kain }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger bubble-shadow-small">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category"><strong>Validasi Harga</strong></p>
                                <h4 class="card-title">{{ count($data_menunggu) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category"><strong>Antrian Produk</strong></p>
                                <h4 class="card-title">{{ count($data_antrian) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category"><strong>Proses Produksi</strong></p>
                                <h4 class="card-title">{{ count($data_proses) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category"><strong>Produksi Selesai</strong></p>
                                <h4 class="card-title">{{ count($data_selesai) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="page-inner mt-2">
    <div class="row">

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round" style="background-color: #d4ffe1;">
                <div class="card-body">
                    <div class="d-flex align-content-center justify-content-center">
                        <h2 class="text-success"><strong class="mr-2">{{ count($transaksi_selesai) }}</strong><small>Transaksi Berhasil</small></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round" style="background-color: #fffed4;">
                <div class="card-body">
                    <div class="d-flex align-content-center justify-content-center">
                        <h2 class="text-warning"><strong class="mr-2">{{ count($pesanan_menunggu) }}</strong><small>Pesanan Menunggu</small></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round" style="background-color: #cfe3fa;">
                <div class="card-body">
                    <div class="d-flex align-content-center justify-content-center">
                        <h2 class="text-primary"><strong class="mr-2">{{ count($desain_dibuat) }}</strong><small>Desain Dibuat</small></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round" style="background-color: #facfcf;">
                <div class="card-body">
                    <div class="d-flex align-content-center justify-content-center">
                        <h2 class="text-danger"><strong class="mr-2">{{ count($pesanan_berjalan) }}</strong><small>Pesanan Berjalan</small></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection