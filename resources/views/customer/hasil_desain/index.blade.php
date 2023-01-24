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
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Hasil Desain</strong>
                        <a href="{{ route('hasil_desain.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus mr-2"> </i> Tambah Hasil Desain</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Desain</th>
                                    <th>Gambar Desain</th>
                                    <th>Ukuran</th>
                                    <th>Tanggal Desain</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @forelse ($hasil_desain as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->hasilbatik_namakarya }}</td>
                                    <td>
                                        @if(count(explode('/', $dt->hasilbatik_file)) == 2)
                                        <img height="80px" src="{{ asset($dt->hasilbatik_file) }}">
                                        @else
                                        <img height="80px" src="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->hasilbatik_file }}">
                                        @endif
                                    </td>
                                    <td>{{ $dt->hasilbatik_widthCanv / 100 . " m x " . $dt->hasilbatik_heightCanv / 100 . " m" }}</td>
                                    <td>{{ $dt->hasilbatik_tanggal }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Tindakan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#keranjang{{ $dt->hasilbatik_id }}">Tambah Keranjang</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusdesain{{ $dt->hasilbatik_id }}">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="keranjang{{ $dt->hasilbatik_id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title"><strong>Tambah ke Keranjang {{ $dt->hasilbatik_namakarya }} ?</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('keranjang.store') }}" method="POST">
                                                    @csrf
                                                    @method('post')

                                                    <div class="col text-center">
                                                        <p>Tekan <strong>Ya</strong> untuk menambahkan ke keranjang {{ $dt->hasilbatik_namakarya }} ! </p>

                                                        <div class="col-md-6 form-group input-group-sm" hidden>
                                                            <input type="text" class="form-control" placeholder="" id="inpIdDesain" name="inpIdDesain" value="{{ $dt->hasilbatik_id }}">
                                                        </div>
                                                        <button class="btn btn-primary btn-sm" type="submit"> Ya </button>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"> Batal </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="hapusdesain{{ $dt->hasilbatik_id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title"><strong>Hapus Data {{ $dt->hasilbatik_namakarya }} ?</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('hasil_desain.destroy', $dt->hasilbatik_id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="col text-center">
                                                        <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->hasilbatik_namakarya }} ! </p>

                                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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