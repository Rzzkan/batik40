@extends('layouts.default')
@section('content')
<div class="page-inner mt--5">
    <div class="row">

        <div class="col-md-6">
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
                        <strong><i class="fas fa-clipboard-check mr-2"> </i>Perbarui Proses Produksi BTK{{ $produksi->id }}RK </strong><a href="{{ route('produksi.index') }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col" method="POST" action="{{ route('produksi.update', $produksi->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 form-group input-group-sm">
                                <label for="inpSekarang">Proses Produksi Sekarang</label>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpSekarang">
                                        <input type="radio" class="form-check-input" id="inpSekarang" name="inpSekarang" value="0" checked>{{ $produksi->nama_proses }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12 form-group input-group-sm">
                                <label for="inpKode">Pilih Proses Produksi</label>
                                <br>
                                @foreach($proses as $dt)
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="inpIdProses{{ $dt->id }}">
                                        <input type="radio" class="form-check-input" id="inpIdProses{{ $dt->id }}" name="inpIdProses" value="{{ $dt->id }}">{{ $dt->nama }}
                                    </label>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-md-12 form-check">
                                <label for="inpSelesai">Produksi Selesai</label>
                                <br>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="1" id="inpSelesai" name="inpSelesai">
                                    <span class="form-check-sign">Centang disini jika produksi selesai!</span>
                                </label>
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <input class="btn btn-primary btn-sm" type="submit" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
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
                        <strong><i class="fas fa-clipboard-check mr-2"> </i> Proses Produksi </strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container py-2 mb-4">
                        @php
                        $no = 1;
                        @endphp
                        @foreach($log_proses as $dt)
                        <div class="row">
                            <!-- timeline item 1 left dot -->
                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                <div class="row h-50">
                                    <div class="col @if($no != 1) border-right @endif ">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                                <h5 class="m-2">
                                    <span class="badge badge-pill @if($produksi->id_proses == $dt->id_proses) bg-success @else bg-light @endif border">&nbsp;</span>
                                </h5>
                                <div class="row h-50">
                                    <div class="col @if($no != count($log_proses) && count($log_proses) != 1) border-right @endif ">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                            </div>
                            <!-- timeline item 1 event content -->
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="">{{ $dt->updated_at }}
                                            <button class="btn btn-sm btn-danger float-right" href="#" data-toggle="modal" data-target="#hapusProduksi{{ $dt->id }}"><i class="fas fa-trash-alt"> </i></button>
                                        </div>
                                        <p class="card-text"><strong>{{ $dt->nama_proses }}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="hapusProduksi{{ $dt->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title"><strong>Hapus Data {{ $dt->nama_proses }} ?</strong></h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('produksi.destroy', $dt->id) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <div class="col text-center">
                                                <p>Tekan <strong>Hapus</strong> untuk menghapus data ini! </p>

                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <strong hidden>{{ $no++ }}</strong>
                        @endforeach
                    </div>
                    <!--container-->
                </div>
            </div>
        </div>

    </div>
</div>
@endsection