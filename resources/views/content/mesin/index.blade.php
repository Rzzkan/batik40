@extends('layouts.default')
@section('content')
<div class="page-inner mt--5">
    <div class="row">

        <div class="col-md-12">
            <form class="row" action="{{ route('biaya_mesin.update', $biaya_mesin->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="far fa-hdd mr-2"> </i> Biaya Mesin - Non Member</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group input-group-sm">
                                    <label for="inpNonLama">Biaya Lama</label>
                                    <input type="number" class="form-control" placeholder="0" id="inpNonLama" name="inpNonLama" value="{{ $biaya_mesin->non_member }}" readonly>
                                </div>

                                <div class="col-6 form-group input-group-sm">
                                    <label for="inpNonBaru">Biaya Baru</label>
                                    <input type="number" class="form-control" placeholder="0" id="inpNonBaru" name="inpNonBaru" value="{{ $biaya_mesin->non_member }}">
                                </div>

                                <div class="col-6 form-group input-group-sm">
                                    <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="far fa-hdd mr-2"> </i> Biaya Mesin - Member</strong>
                        </div>
                        <div class="card-body">
                            <form class="col" action="">
                                <div class="row">
                                    <div class="col-6 form-group input-group-sm">
                                        <label for="inpLama">Biaya Lama</label>
                                        <input type="number" class="form-control" placeholder="0" id="inpLama" name="inpLama" value="{{ $biaya_mesin->member }}" readonly>
                                    </div>

                                    <div class="col-6 form-group input-group-sm">
                                        <label for="inpBaru">Biaya Baru</label>
                                        <input type="number" class="form-control" placeholder="0" id="inpBaru" name="inpBaru" value="{{ $biaya_mesin->member }}">
                                    </div>

                                    <div class="col-6 form-group input-group-sm">
                                        <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
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
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Jenis Mesin</strong>
                        <a href="{{ route('mesin.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus mr-2"> </i> Tambah Jenis Mesin</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Mesin</th>
                                    <th>Kode</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($mesin as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->nama }}</td>
                                    <td>{{ $dt->kode }}</td>
                                    <td>
                                        @if($dt->status == 'Bekerja')
                                        <button type="button" class="btn btn-success btn-sm">
                                            <i class="fas fa-check mr-2"> </i> {{ $dt->status }}
                                        </button>
                                        @elseif($dt->status == 'Idle')
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <i class="fas fa-hourglass-end mr-2"> </i> {{ $dt->status }}
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-exclamation mr-2"> </i> {{ $dt->status }}
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Tindakan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('mesin.edit', $dt->id) }}">ubah</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusMesin{{ $dt->id }}">Hapus</a>
                                            </div>
                                        </div>
                                    </td>

                                    <div class="modal fade" id="hapusMesin{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Hapus Data {{ $dt->nama }} ?</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('mesin.destroy', $dt->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <div class="col text-center">
                                                            <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->nama }} ! </p>

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
                                    <td colspan="5">Data Kosong...</td>
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