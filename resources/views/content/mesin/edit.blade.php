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
                        <strong><i class="far fa-hdd mr-2"> </i> Form Jenis Mesin - Edit {{ $mesin->nama }} </strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('mesin.update', $mesin->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpNama">Nama Mesin - {{ $mesin->nama }}</label>
                                <input type="text" class="form-control" placeholder="" id="inpNama" name="inpNama" value="{{ $mesin->nama }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpKode">Kode Mesin - {{ $mesin->kode }}</label>
                                <input type="text" class="form-control" placeholder="" id="inpKode" name="inpKode" value="{{ $mesin->kode }}">
                            </div>

                            <div class="col-md-12 form-group input-group-sm">
                                <label for="inpKode">Status Mesin - {{ $mesin->status }}</label>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus1">
                                        <input type="radio" class="form-check-input" id="inpStatus1" name="inpStatus" value="Bekerja" @if($mesin->status == 'Bekerja') checked @endif >Bekerja
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus2">
                                        <input type="radio" class="form-check-input" id="inpStatus2" name="inpStatus" value="Idle" @if($mesin->status == 'Idle') checked @endif >Idle
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpStatus3">
                                        <input type="radio" class="form-check-input" id="inpStatus3" name="inpStatus" value="Maintenance" @if($mesin->status == 'Maintenance') checked @endif >Maintenance
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