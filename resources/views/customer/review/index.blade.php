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
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Hasil Desain</strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>ID Transaksi</th>
                                    <th>Review</th>
                                    <!-- <th>Tindakan</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($get_data as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ "BTK" . $dt->id }}</td>
                                    <td>{{ $dt->komentar }}</td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="3">Data Kosong...</td>
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