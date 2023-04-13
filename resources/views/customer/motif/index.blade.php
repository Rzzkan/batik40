@extends('layouts.default')
@section('content')
<div class="page-inner mt-2">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Motif Dasar</strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('motif.index') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Cari motif disini..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Cari Motif</button>
                                </div>
                            </div>
                        </form>
                        <table id="basic-datatables_" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Motif</th>
                                    <th>Gambar Motif</th>
                                    <th>Karakter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($motif as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->motif_nama }}</td>
                                    <td><img height="80px" src="{{ asset('customer/img') . '/' . $dt->motif_file }}"></td>
                                    <td>
                                        {{ $dt->karakter }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Data Kosong...</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $motif->links('includes.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection