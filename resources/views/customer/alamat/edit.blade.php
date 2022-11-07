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
                        <strong><i class="fas fa-fill-drip mr-2"> </i> Form Alamat - Edit </strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('alamat.update', $alamat->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 form-group input-group-sm">
                                <label for="penerima">Nama Penerima</label>
                                <input type="text" class="form-control" placeholder="" id="penerima" name="penerima" value="{{ $alamat->penerima }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="no_hp">Nomor HP</label>
                                <input type="text" class="form-control" placeholder="" id="no_hp" name="no_hp" value="{{ $alamat->no_hp }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm" hidden>
                                <input type="text" class="form-control" placeholder="" id="nama_prov" name="nama_prov" value="{{ $alamat->nama_prov }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm" hidden>
                                <input type="text" class="form-control" placeholder="" id="nama_kab" name="nama_kab" value="{{ $alamat->nama_kab }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm" hidden>
                                <input type="text" class="form-control" placeholder="" id="nama_kec" name="nama_kec" value="{{ $alamat->nama_kec }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="country">Provinsi</label>
                                <select class="form-control" id="prov-dropdown" name="id_prov">
                                    <option value="{{ $alamat->id_prov . '---' . $alamat->nama_prov }}">{{ $alamat->nama_prov }}</option>
                                    @foreach ($data_prov as $country)
                                    <option value="{{ $country['province_id'] . '---' . $country['province'] }}">
                                        {{ $country['province'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="state">Kota/Kabupaten</label>
                                <select class="form-control" id="kab-dropdown" name="id_kab">
                                    <option value="{{ $alamat->id_kab . '---' . $alamat->nama_kab }}">{{ $alamat->nama_kab }}</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="city">Kecamatan</label>
                                <select class="form-control" id="kac-dropdown" name="id_kec">
                                    <option value="{{ $alamat->id_kec . '---' . $alamat->nama_kec }}">{{ $alamat->nama_kec }}</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="alias">Keterangan (Rumah/Kantor/Kost)</label>
                                <input type="text" class="form-control" placeholder="" id="alias" name="alias" value="{{ $alamat->alias }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="alamat">Alamat</label>
                                <textarea type="text" class="form-control" placeholder="" id="alamat" name="alamat">{{ $alamat->alamat }}</textarea>
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