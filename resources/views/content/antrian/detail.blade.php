@extends('layouts.default')
@section('content')
<div class="page-inner mt--5">
    <div class="row">

        <div class="col-md-12">
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
                        <strong><i class="fas fa-clone mr-2"> </i> Tambah Antrian Di Antrian ({{ $detail_mesin->nama . "-" . $detail_mesin->kode }})</strong>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('antrian.store') }}">
                        @csrf
                        <div class="row">

                            @if($detail_mesin->status != 'Maintenance')
                            <div class="col-md-6 form-group input-group-sm" hidden>
                                <label for="inpIdMesin">Id Antrian</label>
                                <input type="text" class="form-control" placeholder="" id="inpIdMesin" name="inpIdMesin" value="{{ $detail_mesin->id }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpIdTransaksi">Pilih Transaksi</label>
                                <select class="form-control" id="inpIdTransaksi" name="inpIdTransaksi">
                                    @foreach ($transaksi_siap as $dtts)
                                    <option value="{{ $dtts->id }}">BTK{{ $dtts->id }}RK</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 form-group input-group-sm">
                                <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                            </div>
                            @else
                            <h4 class="text-danger"><strong>#Mesin sedang maintenance...</strong></h4>
                            @endif

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-align-left mr-2"> </i> Detail Antrian Antrian ({{ $detail_mesin->nama . "-" . $detail_mesin->kode }})</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Transaksi</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($detail_antrian as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>BTK{{ $dt->id_transaksi }}RK</td>
                                    <td>
                                        @if($dt->status == '0')
                                        <button type="button" class="btn btn-success btn-sm">
                                            <i class="fas fa-check mr-2"> </i> Selesai
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <i class="fas fa-hourglass-end mr-2"> </i> Proses
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Tindakan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('antrian.edit', $dt->id) }}">ubah</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusAntrian{{ $dt->id }}">Hapus</a>
                                            </div>
                                        </div>
                                    </td>

                                    <div class="modal fade" id="hapusAntrian{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Hapus Antrian BTK{{ $dt->id_transaksi }}RK?</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('antrian.destroy', $dt->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <div class="col text-center">
                                                            <p>Tekan <strong>Hapus</strong> untuk menghapus antrian BTK{{ $dt->id_transaksi }}RK! </p>

                                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Data Kosong...</td>
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