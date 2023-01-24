@extends('layouts.default')
@section('content')
<div class="page-inner mt-2">
    <div class="row">

        <div class="col-md-8">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session('success') }}
            </div>
            @endif
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
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Keranjang</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">

                        @foreach ($get_data as $dt)
                        @if($dt->status != 2)

                        <div class="row">
                            <div class="col-3">
                                <!-- <img src="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->file_batik }}" width="100%" style="border: 1px solid gray;"> -->
                                @if(count(explode('/', $dt->file_batik)) == 2)
                                <img height="80px" src="{{ asset($dt->file_batik) }}" width="100%" style="border: 1px solid gray;">
                                @else
                                <img height="80px" src="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->file_batik }}" width="100%" style="border: 1px solid gray;">
                                @endif
                            </div>
                            <div class="col">
                                <strong>{{ strtoupper($dt->nama_batik) }}</strong>
                                <p class="card-text">
                                    {{ "Warna: " . $dt->nama_warna . ", teknik: " . $dt->nama_teknik . ", kain: " . $dt->nama_kain . " | Jumlah: " . $dt->jumlah . " | ukuran kain: " . $dt->lebar_kain . " cm x " . $dt->tinggi_kain . " cm" }}
                                    <br>
                                    @php
                                    $total_harga_produk = ($dt->biaya_mesin + $dt->biaya_warna + $dt->biaya_teknik + $dt->biaya_kain) * $dt->jumlah * (($dt->lebar_kain / 100) * ($dt->tinggi_kain / 100));
                                    @endphp
                                    <strong>{{ "Rp " . number_format($total_harga_produk,2,',','.') }}</strong>
                                </p>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#ubah{{ $dt->id }}"><i class="mr-2 fa fa-check-circle" aria-hidden="true"></i> Ubah</button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapuskeranjang{{ $dt->id }}"><i class="mr-2 fas fa-trash-alt" aria-hidden="true"></i> Hapus</button>

                                <div class="modal fade" id="hapuskeranjang{{ $dt->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title"><strong>Hapus Data {{ $dt->nama_batik }} ?</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('keranjang.destroy', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="col text-center">
                                                        <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->nama_batik }} ! </p>

                                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="ubah{{ $dt->id }}">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title"><strong>Ubah Keranjang {{ strtoupper($dt->nama_batik) }} ?</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <form class="col" action="{{ route('keranjang.update', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <!-- <img src="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->file_batik }}" height="80px" style="border: 1px solid gray;"> -->
                                                            @if(count(explode('/', $dt->file_batik)) == 2)
                                                            <img height="80px" src="{{ asset($dt->file_batik) }}">
                                                            @else
                                                            <img height="80px" src="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->file_batik }}">
                                                            @endif
                                                            <p>
                                                                {{ "Warna: " . $dt->nama_warna . ", teknik: " . $dt->nama_teknik . ", kain: " . $dt->nama_kain }}
                                                            </p>
                                                        </div>

                                                        <div class="form-group col-md-6 input-group-sm">
                                                            <label for="sel1">Pilih Warna:</label>
                                                            <select class="form-control" id="inpWarna" name="inpWarna">
                                                                @foreach($warna as $dtw)
                                                                @if($dt->id_warna == $dtw->id)
                                                                <option value="{{ $dtw->id }}">{{ $dtw->nama .' (Rp ' . number_format(($dtw->biaya),2,',','.') . ')' }}</option>
                                                                @endif
                                                                @endforeach

                                                                @foreach($warna as $dtw)
                                                                @if($dt->id_warna != $dtw->id)
                                                                <option value="{{ $dtw->id }}">{{ $dtw->nama .' (Rp ' . number_format(($dtw->biaya),2,',','.') . ')' }}</option>
                                                                @endif

                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6 input-group-sm">
                                                            <label for="inpTeknik">Pilih Teknik Warna:</label>
                                                            <select class="form-control" id="inpTeknik" name="inpTeknik">
                                                                @foreach($teknik as $dtt)

                                                                @if($dt->id_teknik == $dtt->id)
                                                                <option value="{{ $dtt->id }}">{{ $dtt->nama .' (Rp ' . number_format(($dtt->biaya),2,',','.') . ')' }}</option>
                                                                @endif
                                                                @endforeach

                                                                @foreach($teknik as $dtt)
                                                                @if($dt->id_teknik != $dtt->id)
                                                                <option value="{{ $dtt->id }}">{{ $dtt->nama .' (Rp ' . number_format(($dtt->biaya),2,',','.') . ')' }}</option>
                                                                @endif

                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6 input-group-sm">
                                                            <label for="inpKain">Pilih Kain:</label>
                                                            <select class="form-control" id="inpKain" name="inpKain">
                                                                @foreach($kain as $dtk)

                                                                @if($dt->id_kain == $dtk->id)
                                                                <option value="{{ $dtk->id }}">{{ $dtk->nama .' (Rp ' . number_format(($dtk->biaya),2,',','.') . ')' }}</option>
                                                                @endif
                                                                @endforeach

                                                                @foreach($kain as $dtk)
                                                                @if($dt->id_kain != $dtk->id)
                                                                <option value="{{ $dtk->id }}">{{ $dtk->nama .' (Rp ' . number_format(($dtk->biaya),2,',','.') . ')' }}</option>
                                                                @endif

                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6 form-group input-group-sm">
                                                            <label for="inpJumlah">Jumlah Produk:</label>
                                                            <input type="number" class="form-control" placeholder="" id="inpJumlah" name="inpJumlah" value="{{ $dt->jumlah }}">
                                                        </div>

                                                        <div class="col-md-6 form-group input-group-sm">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="inpStatus" class="form-check-input" value="1" @if($dt->status == 1) checked @endif>Pilih produk ini untuk dibayar!
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 form-group input-group-sm">
                                                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-1">
                                <i class="fa fa-check-circle @if($dt->status == 1) text-success @endif " aria-hidden="true"></i>
                            </div>
                        </div>
                        <hr>

                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-credit-card mr-2"> </i> Total Keranjang</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">

                        @php
                        $no = 1;
                        $total = 0;
                        $berat = 0;
                        $id_ker = "";
                        @endphp
                        @foreach ($get_data as $dt)
                        @if($dt->status == 1)

                        @php
                        $harga_item = $total_harga_produk;
                        $total = $total + $harga_item;
                        $berat = $berat + ($dt->berat_kain * $dt->jumlah);
                        $id_ker = $id_ker . "--" . $dt->id;
                        @endphp

                        <div class="row">
                            <div class="col-1">
                                {{ $no++ }}
                            </div>
                            <div class="col">
                                <p class="card-text">
                                    <strong>
                                        {{ strtoupper($dt->nama_batik) }}
                                    </strong>
                                    <br>
                                    {{ "Rp " . number_format(($harga_item),2,',','.') }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        @endif
                        @endforeach

                        <h5><strong>Total Pesanan : {{ "Rp " . number_format(($total),2,',','.') }}</strong></h5>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahTransaksi"><i class="fas fa-credit-card mr-2"> </i> Pesan Sekarang</button>

                        <div class="modal fade" id="tambahTransaksi">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title"><strong>Melakukan Pemesanan</strong></h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('transaksi.store') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="col-md-6 form-group input-group-sm" hidden>
                                                <input type="number" class="form-control" placeholder="" id="inpBerat" name="inpBerat" value="{{ $berat }}">
                                            </div>

                                            <div class="col-md-6 form-group input-group-sm" hidden>
                                                <input type="number" class="form-control" placeholder="" id="inpTotal" name="inpTotal" value="{{ $total }}">
                                            </div>

                                            <div class="col-md-6 form-group input-group-sm" hidden>
                                                <input type="text" class="form-control" placeholder="" id="inpIdker" name="inpIdker" value="{{ $id_ker }}">
                                            </div>

                                            <div class="col">
                                                <strong class="">Pilih alamat pengiriman: </strong>
                                                <br>

                                                @foreach($alamat as $dtal)

                                                <div class="col-md-12 mt-3">
                                                    <div class="row border p-2 mb-3">
                                                        <div class="">
                                                            <input type="radio" name="inpAlamat" id="inpAlamat{{ $dtal->id }}" value="{{ $dtal->id }}">
                                                        </div>
                                                        <label class="col" for="inpAlamat{{ $dtal->id }}">{{ '(' . $dtal->penerima . ') ' . $dtal->alamat }}</label>
                                                    </div>
                                                </div>

                                                @endforeach

                                                <!-- <p>Dengan menekan tombol <strong>Lakukan Pemesanan</strong> maka proses akan dilanjutkan pada menu transaksi! </p> -->

                                                <div class="col-md-12 mb-3" hidden>
                                                    <label class="form-check-label m-2">
                                                        <input type="checkbox" name="inpBiayaEkstra" class="form-check-input mr-2" value="{{ $data['data_setting']->biaya_ekstra }}"> Jika anda setuju kami akan mempercepat proses pengerjaan produk anda dengan menambah biaya ekstra sebesar <strong>{{ "Rp " . number_format($data['data_setting']->biaya_ekstra,2,',','.')  }}</strong>
                                                    </label>
                                                </div>

                                                <button class="btn btn-primary btn-sm" type="submit">Lanjutkan Pemesanan</button>
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection