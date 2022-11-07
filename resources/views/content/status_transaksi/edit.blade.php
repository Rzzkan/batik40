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
                        <strong><i class="far fa-hdd mr-2"> </i> Form Status Transaksi - Edit BTK{{ $transaksi->id }} </strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('status_transaksi.update', $transaksi->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpResi">Resi - {{ $transaksi->resi }}</label>
                                <input type="text" class="form-control" placeholder="" id="inpResi" name="inpResi" value="{{ $transaksi->resi }}">
                            </div>

                            <div class="col-md-12 form-group input-group-sm">
                                <label for="inpStatusTransaksi">Status Transaksi - {{ $transaksi->status_pengiriman }}</label>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus1">
                                        <input type="radio" class="form-check-input" id="inpStatus1" name="inpStatusTransaksi" value="belum_dibayar" @if($transaksi->status_pengiriman == 'belum_dibayar') checked @endif >Belum Dibayar
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus2">
                                        <input type="radio" class="form-check-input" id="inpStatus2" name="inpStatusTransaksi" value="diproses" @if($transaksi->status_pengiriman == 'diproses') checked @endif >Diproses
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus3">
                                        <input type="radio" class="form-check-input" id="inpStatus3" name="inpStatusTransaksi" value="dikemas" @if($transaksi->status_pengiriman == 'dikemas') checked @endif >Dikemas
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus4">
                                        <input type="radio" class="form-check-input" id="inpStatus4" name="inpStatusTransaksi" value="dikirim" @if($transaksi->status_pengiriman == 'dikirim') checked @endif >Dikirim
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus5">
                                        <input type="radio" class="form-check-input" id="inpStatus5" name="inpStatusTransaksi" value="selesai" @if($transaksi->status_pengiriman == 'selesai') checked @endif >Selesai
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus6">
                                        <input type="radio" class="form-check-input" id="inpStatus6" name="inpStatusTransaksi" value="dibatalkan" @if($transaksi->status_pengiriman == 'dibatalkan') checked @endif >Dibatalkan
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