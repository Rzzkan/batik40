@extends('layouts.default')
@section('content')
<div class="page-inner mt--5">
    <div class="row">

        <div class="col-md-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-clipboard-check mr-2"> </i> Rincian Pesanan </strong>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    @php
                    $total = 0;
                    @endphp
                    <div class="col-12">
                        @foreach($validasi->produks as $dt)
                        @php
                        $harga = ($dt->biaya_mesin + $dt->biaya_warna + $dt->biaya_teknik + $dt->biaya_kain) * $dt->jumlah * (($dt->lebar_kain / 100) * ($dt->tinggi_kain / 100));
                        $total = $total + $harga;
                        @endphp
                        <div class="row">
                            <div class="col-2">
                                <!-- <img src="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->file_batik }}" width="100%" style="border: 1px solid gray;"> -->
                                @if(count(explode('/', $dt->file_batik)) == 2)
                                <img src="{{ asset($dt->file_batik) }}" width="100%" style="border: 1px solid gray;">
                                @else
                                <img src="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->file_batik }}" width="100%" style="border: 1px solid gray;">
                                @endif
                            </div>
                            <div class="col">
                                <strong>{{ strtoupper($dt->nama_batik) }}</strong>
                                <p class="card-text">
                                    {{ "Warna: " . $dt->nama_warna . ", teknik: " . $dt->nama_teknik . ", kain: " . $dt->nama_kain . " | Jumlah: " . $dt->jumlah }}
                                    <br>
                                    <strong>{{ "Rp " . number_format($harga,2,',','.') }}</strong>
                                </p>
                                @if(count(explode('/', $dt->file_batik)) == 2)
                                <a href="{{ asset($dt->file_batik) }}" class="btn btn-sm btn-primary my-2" download>
                                    Unduh Desain
                                </a>
                                @else
                                <a href="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->file_batik }}" class="btn btn-sm btn-primary my-2" download>
                                    Unduh Desain
                                </a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>

                    <div class="col-12">
                        <u>Total + Biaya Ekstra:</u>
                        <h3><strong>{{ "Rp " . number_format($total,2,',','.') . " + Rp " . number_format($validasi->biaya_ekstra,2,',','.') }}</strong></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-clipboard-check mr-2"> </i> Validasi Harga - Edit {{ 'BTK' . $validasi->id }} </strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('validasi.update', $validasi->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-12 form-group input-group-sm">
                                <label for="inpTotal">Harga Produk - {{ "Rp " . number_format($validasi->total,2,',','.') }}</label>
                                <input type="number" class="form-control" placeholder="" id="inpTotal" name="inpTotal" value="{{ $validasi->total }}">
                            </div>

                            @if($validasi->status == 'menunggu')
                            <div class="col-md-12 form-group input-group-sm">
                                <label for="inpKode">Validasi Harga</label>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus1">
                                        <input type="radio" class="form-check-input" id="inpStatus1" name="inpStatus" value="menunggu" @if($validasi->status == 'menunggu') checked @endif >Menawarkan
                                    </label>
                                </div>

                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus2">
                                        <input type="radio" class="form-check-input" id="inpStatus2" name="inpStatus" value="siap_diantrikan" @if($validasi->status == 'siap_diantrikan') checked @endif >Terima dan Siap Diantrikan
                                    </label>
                                </div>

                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus3">
                                        <input type="radio" class="form-check-input" id="inpStatus3" name="inpStatus" value="batal" @if($validasi->status == 'batal') checked @endif >Tolak atau Batalkan
                                    </label>
                                </div>

                            </div>

                            <div class="col-md-12 form-group input-group-sm">
                                <label for="inpCatatan">Tulis Catatan, Estimasi Waktu Produksi, Estimasi Dengan Biaya Ekstra</label>
                                <textarea type="text" class="form-control" placeholder="Catatan" id="inpCatatan" name="inpCatatan">{{ $validasi->catatan }}</textarea>
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                            </div>
                            @else
                            <div class="col-md-6 form-group input-group-sm">
                                - Pesanan telah diproduksi.
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection