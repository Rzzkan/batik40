@extends('layouts.default')
@section('content')
<div class="page-inner mt--5">
    <div class="row">

        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Status Transaksi</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" style="white-space: nowrap" class="table table-bordered">
                            <thead class="">
                                <tr>
                                    <th>Kode</th>
                                    <th>Transaksi</th>
                                    <th>Detail Transaksi</th>
                                    <th>Pembayaran & Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($transaksi as $dt)
                                <tr>
                                    <td class="align-top">{{ $no++ . ". BTK" . $dt->id }}RK</td>
                                    <td class="align-top">
                                        <strong>Akun : {{ $dt->email_user }} </strong>
                                        <br><small>Penerima : {{ $dt->alamat->penerima .' | '. $dt->alamat->no_hp }}</small>
                                    </td>
                                    <td class="align-top">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail{{ $dt->id }}"><i class="fas fa-credit-card mr-2"> </i> Lihat Detail </button>
                                    </td>
                                    <td class="align-top">
                                        @if($dt->sudah_dibayar == 0)
                                        <button class="btn btn-danger btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Belum Dibayar</button>
                                        @elseif($dt->sudah_dibayar == 1)
                                        <button class="btn btn-warning btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Cek Pembayaran</button>
                                        @elseif($dt->sudah_dibayar == 3)
                                        <button class="btn btn-warning btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Dibayar DP</button>
                                        @else
                                        <button class="btn btn-success btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Sudah Dibayar</button>
                                        @endif


                                        <button class="btn btn-sm btn-info" @if($dt->status_pengiriman!='validasi' ) hidden @endif><i class="fa fa-check-square mr-2"> </i> Validasi</button>
                                        <button class="btn btn-sm btn-info" @if($dt->status_pengiriman!='belum_dibayar' ) hidden @endif><i class="fas fa-credit-card mr-2"> </i> Belum Dibayar</button>
                                        <button class="btn btn-sm btn-info" @if($dt->status_pengiriman!='diproses' ) hidden @endif><i class="fa fa-hourglass-start mr-2"> </i> Diproses</button>
                                        <button class="btn btn-sm btn-info" @if($dt->status_pengiriman!='dikemas' ) hidden @endif><i class="fas fa-shopping-bag mr-2"> </i> Dikemas</button>
                                        <button class="btn btn-sm btn-info" @if($dt->status_pengiriman!='dikirim' ) hidden @endif><i class="fa fa-truck mr-2"> </i> Dikirim</button>
                                        <button class="btn btn-sm btn-info" @if($dt->status_pengiriman!='selesai' ) hidden @endif><i class="fas fa-people-carry mr-2"> </i> Selesai</button>
                                        <button class="btn btn-sm btn-info" @if($dt->status_pengiriman!='dibatalkan' ) hidden @endif><i class="fas fa-window-close mr-2"> </i> Dibatalkan</button>
                                    </td>

                                    <td class="align-top">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Tindakan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('status_transaksi.edit', $dt->id) }}">Ubah Status Transaksi</a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#pembayaran{{ $dt->id }}" href="#">Ubah Status Pembayaran</a>
                                                <a class=" dropdown-item" data-toggle="modal" data-target="#komentar{{ $dt->id }}" href="#">Lihat Komentar</a>
                                            </div>
                                        </div>
                                    </td>

                                    <div class="modal fade" id="detail{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Detail Alamat Pengiriman - BKT{{ $dt->id }}</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <strong>Produk: </strong><br>{{ "Rp " . number_format(($dt->total - $dt->biaya_ekstra),2,',','.') }}
                                                    <hr>
                                                    <strong>Ongkir: </strong><br>{{ "Rp " . number_format($dt->ro_cost,2,',','.') }}
                                                    <hr>
                                                    <strong>Biaya Ekstra: </strong><br>{{ "Rp " . number_format(($dt->biaya_ekstra),2,',','.') }}
                                                    <hr>
                                                    <strong>Total: </strong><br>{{ "Rp " . number_format(($dt->total + $dt->ro_cost),2,',','.') }}
                                                    <hr>
                                                    <strong>Sudah Dibayar: </strong><br>{{ "Rp " . number_format(($dt->bayar_dp),2,',','.') }}
                                                    <hr>
                                                    <strong>Resi: </strong><br>{{ $dt->resi }}
                                                    <hr>
                                                    <strong>Expedisi: </strong><br>{{ $dt->ro_description .' ('. $dt->ro_service .') | '. $dt->ro_etd .' hari | '. $dt->ro_name }}
                                                    <hr>
                                                    <strong>Alamat: </strong><br>
                                                    {{ $dt->alamat->alamat .', '. $dt->alamat->nama_kec .', '. $dt->alamat->nama_kab .', '. $dt->alamat->nama_prov }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="komentar{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Review Pelanggan</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    {{ $dt->komentar }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="pembayaran{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Statas Pembayaran</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <form class="col" method="POST" action="{{ route('status_transaksi.update', $dt->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">

                                                                <div class="col-md-12 form-group input-group-sm">
                                                                    <label for="inpStatusPembayaran">Status Pembayaran</label>
                                                                    <br>
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label" for="inpStatus1">
                                                                            <input type="radio" class="form-check-input" id="inpStatus1" name="inpStatusPembayaran" value="0" @if($dt->sudah_dibayar == 0) checked @endif >Belum Dibayar
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label" for="inpStatus2">
                                                                            <input type="radio" class="form-check-input" id="inpStatus2" name="inpStatusPembayaran" value="1" @if($dt->sudah_dibayar == 1) checked @endif >Cek Pembayaran
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label" for="inpStatus4">
                                                                            <input type="radio" class="form-check-input" id="inpStatus4" name="inpStatusPembayaran" value="3" @if($dt->sudah_dibayar == 3) checked @endif >Sudah Dibayar DP
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label" for="inpStatus3">
                                                                            <input type="radio" class="form-check-input" id="inpStatus3" name="inpStatusPembayaran" value="2" @if($dt->sudah_dibayar == 2) checked @endif >Sudah Dibayar Lunas
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 form-group input-group-sm">
                                                                    <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">Data Kosong...</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection