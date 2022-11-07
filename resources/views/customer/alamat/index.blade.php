@extends('layouts.default')
@section('content')
<div class="page-inner mt-2">
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
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Alamat</strong>
                        <a href="{{ route('alamat.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus mr-2"> </i> Tambah Alamat</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Penerima</th>
                                    <th>No. Hp</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>Kecamatan</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($alamat as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->penerima }}</td>
                                    <td>{{ $dt->no_hp }}</td>
                                    <td>{{ $dt->alamat }}</td>
                                    <td>{{ $dt->alias }}</td>
                                    <td>{{ $dt->nama_kec }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Tindakan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('alamat.edit', $dt->id) }}">ubah</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusalamat{{ $dt->id }}">Hapus</a>
                                            </div>
                                        </div>
                                    </td>

                                    <div class="modal fade" id="hapusalamat{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Hapus Data {{ $dt->nama }} ?</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('alamat.destroy', $dt->id) }}" method="POST">
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
                                    <td colspan="7">Data Kosong...</td>
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