@extends('layouts.default')
@section('content')
<div class="page-inner mt--5">
    <div class="col-md-12">
        <form class="row" action="{{ route('setting.update', $setting->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="far fa-hdd mr-2"> </i> Url Desain - ({{ $setting->url_desain }})</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 form-group input-group-sm">
                                <label for="inpUrlDesain">Url Desain </label>
                                <input type="text" class="form-control" placeholder="0" id="inpUrlDesain" name="inpUrlDesain" value="{{ $setting->url_desain }}">
                            </div>

                            <div class="col-12 form-group input-group-sm">
                                <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="far fa-hdd mr-2"> </i> Nomor CS - ({{ $setting->no_toko }})</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 form-group input-group-sm">
                                <label for="inpNomor">Nomor CS </label>
                                <input type="text" class="form-control" placeholder="0" id="inpNomor" name="inpNomor" value="{{ $setting->no_toko }}">
                            </div>

                            <div class="col-12 form-group input-group-sm">
                                <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="far fa-hdd mr-2"> </i> Url Hasil Folder Desain - ({{ $setting->base_url_img_desain_batik }})</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 form-group input-group-sm">
                                <label for="inpUrlDesain">Url Hasil Folder Desain </label>
                                <input type="text" class="form-control" placeholder="0" id="inpUrlHasilDesain" name="inpUrlHasilDesain" value="{{ $setting->base_url_img_desain_batik }}">
                            </div>

                            <div class="col-12 form-group input-group-sm">
                                <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="far fa-hdd mr-2"> </i> Biaya Ekstra - ({{ "Rp " . number_format($setting->biaya_ekstra,2,',','.') }})</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 form-group input-group-sm">
                                <label for="inpBiayaEkstra">Biaya Ekstra </label>
                                <input type="number" class="form-control" placeholder="0" id="inpBiayaEkstra" name="inpBiayaEkstra" value="{{ $setting->biaya_ekstra }}">
                            </div>

                            <div class="col-12 form-group input-group-sm">
                                <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="far fa-hdd mr-2"> </i> Lokasi Toko: </strong>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 form-group input-group-sm" hidden>
                            <input type="text" class="form-control" placeholder="" id="nama_prov" name="nama_prov_toko" value="{{ $setting->nama_prov_toko }}">
                        </div>

                        <div class="col-md-6 form-group input-group-sm" hidden>
                            <input type="text" class="form-control" placeholder="" id="nama_kab" name="nama_kab_toko" value="{{ $setting->nama_kab_toko }}">
                        </div>

                        <div class="col-md-6 form-group input-group-sm" hidden>
                            <input type="text" class="form-control" placeholder="" id="nama_kec" name="nama_kec_toko" value="{{ $setting->nama_kec_toko }}">
                        </div>

                        <div class="col-md-12 form-group input-group-sm">
                            <label for="country">Provinsi</label>
                            <select class="form-control" id="prov-dropdown" name="id_prov_toko">
                                <option value="{{ $setting->id_prov_toko . '---' . $setting->nama_prov_toko }}">{{ $setting->nama_prov_toko }}</option>
                                @foreach ($data_prov as $country)
                                <option value="{{ $country['province_id'] . '---' . $country['province'] }}">
                                    {{ $country['province'] }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 form-group input-group-sm">
                            <label for="state">Kota/Kabupaten</label>
                            <select class="form-control" id="kab-dropdown" name="id_kab_toko">
                                <option value="{{ $setting->id_kab_toko . '---' . $setting->nama_kab_toko }}">{{ $setting->nama_kab_toko }}</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group input-group-sm">
                            <label for="city">Kecamatan</label>
                            <select class="form-control" id="kac-dropdown" name="id_kec_toko">
                                <option value="{{ $setting->id_kec_toko . '---' . $setting->nama_kec_toko }}">{{ $setting->nama_kec_toko }}</option>
                            </select>
                        </div>

                        <div class="col-12 form-group input-group-sm">
                            <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection