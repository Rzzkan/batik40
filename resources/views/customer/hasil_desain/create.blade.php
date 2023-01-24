@extends('layouts.default')
@section('content')

<div class="page-inner mt-2">
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
                        <strong><i class="fas fa-pen mr-2"> </i> Form Hasil Desain</strong>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('hasil_desain.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group input-group-sm">
                                <label for="hasilbatik_namakarya">Nama Desain</label>
                                <input type="text" class="form-control" placeholder="" id="hasilbatik_namakarya" name="hasilbatik_namakarya">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="hasilbatik_file">Berkas Gambar</label>
                                <input type="file" class="form-control" placeholder="" id="hasilbatik_file" name="hasilbatik_file">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="hasilbatik_widthCanv">Panjang (cm)</label>
                                <input type="number" class="form-control" placeholder="" id="hasilbatik_widthCanv" name="hasilbatik_widthCanv">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="hasilbatik_heightCanv">Lebar (cm)</label>
                                <input type="number" class="form-control" placeholder="" id="hasilbatik_heightCanv" name="hasilbatik_heightCanv">
                            </div>

                            <div class="col-md-12 form-group input-group-sm">
                                <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection