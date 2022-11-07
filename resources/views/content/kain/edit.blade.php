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
                        <strong><i class="fas fa-paperclip mr-2"> </i> Form Jenis Kain (per 1m x 1m) - Edit {{ $kain->nama }} </strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('kain.update', $kain->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpNama">Nama Kain - {{ $kain->nama }}</label>
                                <input type="text" class="form-control" placeholder="" id="inpNama" name="inpNama" value="{{ $kain->nama }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpBiaya">Biaya Kain - {{ "Rp " . number_format($kain->biaya,2,',','.') }}</label>
                                <input type="number" class="form-control" placeholder="" id="inpBiaya" name="inpBiaya" value="{{ $kain->biaya }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpBerat">Berat Kain (gram)</label>
                                <input type="number" class="form-control" placeholder="" id="inpBerat" name="inpBerat" value="{{ $kain->berat }}">
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