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
                        <strong><i class="fas fa-align-left mr-2"> </i> Kelola Validasi Harga</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Pesanan</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($validasi as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>BTK{{ $dt->id }}RK</td>
                                    <td>{{ "Rp " . number_format($dt->total,2,',','.') }}</td>
                                    <td>
                                        @if($dt->status == 'menunggu')
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <i class="fas fa-exclamation mr-2"> </i> {{ $dt->status }}
                                        </button>
                                        @elseif($dt->status == 'siap_diantrikan')
                                        <button type="button" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-hourglass-end mr-2"> </i> {{ $dt->status }}
                                        </button>
                                        @elseif($dt->status == 'proses')
                                        <button type="button" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-hourglass-end mr-2"> </i> {{ $dt->status }}
                                        </button>
                                        @elseif($dt->status == 'batal')
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban mr-2"> </i> {{ $dt->status }}
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-success btn-sm">
                                            <i class="fas fa-check mr-2"> </i> {{ $dt->status }}
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Tindakan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('validasi.edit', $dt->id) }}">validasi</a>
                                            </div>
                                        </div>
                                    </td>

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