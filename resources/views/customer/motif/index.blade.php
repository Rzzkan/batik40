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
                        <table id="basic-datatables" class="table table-bordered table-hover">
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
                                        @foreach ($karakter as $dt_kar)
                                        @if($dt_kar->motif_id == $dt->motif_id)
                                        {{ $dt_kar->nama_karakter . ", " }}
                                        @endif
                                        @endforeach
                                    </td>
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