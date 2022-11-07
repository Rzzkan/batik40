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
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Pelanggan</strong>
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus mr-2"> </i> Tambah Pelanggan</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Member</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($pelanggan as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->name }}</td>
                                    <td>{{ $dt->role }}</td>
                                    <td>{{ $dt->email }}</td>
                                    <td>{{ $dt->no_hp }}</td>
                                    <td>
                                        @if($dt->member)
                                        <button class="btn btn-sm btn-success">Member</button>
                                        @else
                                        <button class="btn btn-sm btn-danger">Non Member</button>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Tindakan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('pelanggan.edit', $dt->id) }}">ubah</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusPelanggan{{ $dt->id }}">Hapus</a>
                                            </div>
                                        </div>
                                    </td>

                                    <div class="modal fade" id="hapusPelanggan{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Hapus Data {{ $dt->name }} ?</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('pelanggan.destroy', $dt->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <div class="col text-center">
                                                            <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->name }} ! </p>

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