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
                        <strong><i class="fas fa-clone mr-2"> </i> Ubah Antrian Di ({{ $detail_mesin->nama . "-" . $detail_mesin->kode }})</strong>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('antrian.update', $antrian->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpIdTransaksi">Pilih Transaksi</label>
                                <select class="form-control" id="inpIdTransaksi" name="inpIdTransaksi">
                                    <option value="{{ $detail_transaksi->id }}">BTK{{ $detail_transaksi->id }}RK</option>

                                    @foreach ($transaksi_siap as $dtts)
                                    @if($dtts->id != $antrian->id_transaksi)
                                    <option value="{{ $dtts->id }}">BTK{{ $dtts->id }}RK</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 form-group input-group-sm">
                                <label for="inpKode">Ubah Status Antrian</label>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus1">
                                        <input type="radio" class="form-check-input" id="inpStatus1" name="inpStatus" value="1" @if($antrian->status == 1) checked @endif >Proses
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus2">
                                        <input type="radio" class="form-check-input" id="inpStatus2" name="inpStatus" value="0" @if($antrian->status == 0) checked @endif >Selesai
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
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