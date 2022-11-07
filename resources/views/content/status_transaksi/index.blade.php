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
                        <table id="basic-datatables" style="white-space: nowrap" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Transaksi</th>
                                    <th>Pemesan</th>
                                    <th>Pengiriman</th>
                                    <th>Biaya</th>
                                    <th>Pembayaran</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($transaksi as $dt)
                                <tr>
                                    <td class="align-top">{{ $no++ }}</td>
                                    <td class="align-top">{{ "BTK" . $dt->id }}</td>
                                    <td class="align-top">
                                        <strong>Akun: </strong><br>{{ $dt->nama_user .' | '. $dt->email_user }}
                                        <hr>
                                        <strong>Penerima: </strong><br>{{ $dt->alamat->penerima .' | '. $dt->alamat->no_hp }}
                                    </td>
                                    <td class="align-top">
                                        <strong>Resi: </strong><br>{{ $dt->resi }}
                                        <hr>
                                        <strong>Expedisi: </strong><br>{{ $dt->ro_description .' ('. $dt->ro_service .') | '. $dt->ro_etd .' hari | '. $dt->ro_name }}
                                        <hr>
                                        <strong>Alamat: </strong><br>
                                        <button class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#alamat{{ $dt->id }}"><i class="fas fa-map-marked-alt mr-2"> </i> Detail Alamat</button>
                                    </td>
                                    <td class="align-top">
                                        <strong>Produk: </strong><br>{{ "Rp " . number_format($dt->total,2,',','.') }}
                                        <hr>
                                        <strong>Ongkir: </strong><br>{{ "Rp " . number_format($dt->ro_cost,2,',','.') }}
                                        <hr>
                                        <strong>Total: </strong><br>{{ "Rp " . number_format(($dt->total + $dt->ro_cost),2,',','.') }}
                                    </td>
                                    <td class="align-top">
                                        @if($dt->sudah_dibayar == 0)
                                        <button class="btn btn-danger btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Belum Dibayar</button>
                                        @elseif($dt->sudah_dibayar == 1)
                                        <button class="btn btn-warning btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Cek Pembayaran</button>
                                        @else
                                        <button class="btn btn-success btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Sudah Dibayar</button>
                                        @endif
                                    </td>
                                    <td class="align-top">
                                        <button class="col btn btn-sm " @if($dt->status_pengiriman!='validasi' ) hidden @endif><i class="fa fa-check-square mr-2"> </i> Validasi</button>
                                        <button class="col btn btn-sm " @if($dt->status_pengiriman!='belum_dibayar' ) hidden @endif><i class="fas fa-credit-card mr-2"> </i> Belum Dibayar</button>
                                        <button class="col btn btn-sm " @if($dt->status_pengiriman!='diproses' ) hidden @endif><i class="fa fa-hourglass-start mr-2"> </i> Diproses</button>
                                        <button class="col btn btn-sm " @if($dt->status_pengiriman!='dikemas' ) hidden @endif><i class="fas fa-shopping-bag mr-2"> </i> Dikemas</button>
                                        <button class="col btn btn-sm " @if($dt->status_pengiriman!='dikirim' ) hidden @endif><i class="fa fa-truck mr-2"> </i> Dikirim</button>
                                        <button class="col btn btn-sm " @if($dt->status_pengiriman!='selesai' ) hidden @endif><i class="fas fa-people-carry mr-2"> </i> Selesai</button>
                                        <button class="col btn btn-sm " @if($dt->status_pengiriman!='dibatalkan' ) hidden @endif><i class="fas fa-window-close mr-2"> </i> Dibatalkan</button>
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

                                    <div class="modal fade" id="alamat{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Detail Alamat Pengiriman - BKT{{ $dt->id }}</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
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
                                                                        <label class="form-check-label" for="inpStatus3">
                                                                            <input type="radio" class="form-check-input" id="inpStatus3" name="inpStatusPembayaran" value="2" @if($dt->sudah_dibayar == 2) checked @endif >Sudah Dibayar
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