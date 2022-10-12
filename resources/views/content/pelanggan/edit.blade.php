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
                        <strong><i class="fas fa-users mr-2"> </i> Form Pelanggan - Edit {{ $pelanggan->name }} </strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpNama">Nama Pelanggan - {{ $pelanggan->name }}</label>
                                <input type="text" class="form-control" placeholder="" id="inpNama" name="inpNama" value="{{ $pelanggan->name }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpEmail">Email</label>
                                <input type="email" class="form-control" placeholder="" id="inpEmail" name="inpEmail" value="{{ $pelanggan->email }}">
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="inpNo">No. HP</label>
                                <input type="text" class="form-control" placeholder="" id="inpNo" name="inpNo" value="{{ $pelanggan->no_hp }}">
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