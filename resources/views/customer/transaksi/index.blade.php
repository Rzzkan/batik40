@extends('layouts.default')
@section('content')
<div class="page-inner mt-2">
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col"><a href="{{ route('transaksi.show', 'validasi') }}" class="col btn btn-sm @if($posisi == 'validasi') btn-primary @else btn-outline-primary @endif "><i class="fa fa-check-square mr-2"> </i> Validasi</a></div>
                <div class="col"><a href="{{ route('transaksi.show', 'belum_dibayar') }}" class="col btn btn-sm @if($posisi == 'belum_dibayar') btn-primary @else btn-outline-primary @endif "><i class="fas fa-credit-card mr-2"> </i> Belum Dibayar</a></div>
                <div class="col"><a href="{{ route('transaksi.show', 'diproses') }}" class="col btn btn-sm @if($posisi == 'diproses') btn-primary @else btn-outline-primary @endif "><i class="fa fa-hourglass-start mr-2"> </i> Diproses</a></div>
                <div class="col"><a href="{{ route('transaksi.show', 'dikemas') }}" class="col btn btn-sm @if($posisi == 'dikemas') btn-primary @else btn-outline-primary @endif "><i class="fas fa-shopping-bag mr-2"> </i> Dikemas</a></div>
                <div class="col"><a href="{{ route('transaksi.show', 'dikirim') }}" class="col btn btn-sm @if($posisi == 'dikirim') btn-primary @else btn-outline-primary @endif "><i class="fa fa-truck mr-2"> </i> Dikirim</a></div>
                <div class="col"><a href="{{ route('transaksi.show', 'selesai') }}" class="col btn btn-sm @if($posisi == 'selesai') btn-primary @else btn-outline-primary @endif "><i class="fas fa-people-carry mr-2"> </i> Selesai</a></div>
                <div class="col"><a href="{{ route('transaksi.show', 'dibatalkan') }}" class="col btn btn-sm @if($posisi == 'dibatalkan') btn-primary @else btn-outline-primary @endif "><i class="fas fa-window-close mr-2"> </i> Dibatalkan</a></div>
            </div>
            <hr>
        </div>

        @foreach ($get_data as $dto)

        <div class="col-md-8">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session('success') }}
            </div>
            @endif
            @if(Session::has('failed'))
            <div class="alert alert-danger">
                {{ Session('failed') }}
            </div>
            @endif
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
                        <strong><i class="fas fa-shopping-bag mr-2"> </i> Data Transaksi: BTK{{ $dto->id }}RK</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">

                        @foreach ($dto->produks as $dt)
                        @if($dt->status == 2)

                        <div class="row">
                            <div class="col-2">
                                <img src="{{ $data['data_setting']->base_url_img_desain_batik . '/' . $dt->file_batik }}" width="100%" style="border: 1px solid gray;">
                            </div>
                            <div class="col">
                                <strong>{{ strtoupper($dt->nama_batik) }}</strong>
                                <p class="card-text">
                                    {{ "Warna: " . $dt->nama_warna . ", teknik: " . $dt->nama_teknik . ", kain: " . $dt->nama_kain . " | Jumlah: " . $dt->jumlah }}
                                    <br>
                                    <strong>{{ "Rp " . number_format((($dt->biaya_mesin + $dt->biaya_warna + $dt->biaya_teknik + $dt->biaya_kain) * $dt->jumlah),2,',','.') }}</strong>
                                </p>

                            </div>
                        </div>
                        <hr>

                        @endif
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-clipboard-list mr-2"> </i> Data Transaksi: BTK{{ $dto->id }}RK</strong>
                    </div>
                </div>

                <!--Validasi-->
                @if($posisi == 'validasi')
                <div class="card-body">
                    <strong>Pesanan Sedang Divalidasi!</strong>
                    <p class="text-danger">
                        Pesanan anda dalam proses validasi oleh tim kami. Mohon tunggu beberapa saat atau hubungi kami.
                    </p>
                    <a href="https://api.whatsapp.com/send?phone={{ $data['data_setting']->no_toko }}" target="_blank" class="btn btn-sm btn-success"><i class="fab fa-whatsapp mr-2"> </i> Whatsapp</a>
                </div>
                @endif

                <!--belum bayar-->
                @if($posisi == 'belum_dibayar')
                <div class="card-body">
                    <strong>Alamat Pengiriman:</strong>
                    <p>
                        @if($dto->ro_cost > 0)
                        {{ "Rp " . number_format($dto->ro_cost,2,',','.') . " | " . $dto->ro_etd . " | " . $dto->ro_name . " | " . $dto->ro_description . " | (" . $dto->ro_service . ")" }}
                        @else
                        Belum memilih metode pengiriman.
                        @endif
                    </p>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#pengiriman{{ $dto->id }}"><i class="fa fa-truck mr-2" aria-hidden="true"></i> Pilih Pengiriman</button>

                    <div class="modal fade" id="pengiriman{{ $dto->id }}">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title"><strong><i class="fa fa-truck mr-2" aria-hidden="true"></i> Pilih Pengiriman </strong></h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <form class="col" action="{{ route('transaksi.update', $dto->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">

                                            <div class="col-md-6 form-group input-group-sm">
                                                <label for="country">Expedisi</label>
                                                <select class="form-control" id="expedisi-dropdown" name="inpExpedisi">
                                                    <option value="">Pilih Expedisi</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---pos' }}">pos</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---tiki' }}">tiki</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---jne' }}">jne</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---pcp' }}">pcp</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---esl' }}">esl</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---rpx' }}">rpx</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---pandu' }}">pandu</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---wahana' }}">wahana</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---jnt' }}">jnt</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---pahala' }}">pahala</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---cahaya' }}">cahaya</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---sap' }}">sap</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---jet' }}">jet</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---indah' }}">indah</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---dse' }}">dse</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---slis' }}">slis</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---first' }}">first</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---ncs' }}">ncs</option>
                                                    <option value="{{ $data['data_setting']->id_kec_toko . '---' . $dto->id_kec .'---'. $dto->berat . '---star' }}">star</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group input-group-sm">
                                                <label for="state">Pilih Pengiriman</label>
                                                <select class="form-control" id="price-dropdown" name="inpPengiriman">
                                                </select>
                                            </div>

                                            <div class="col-md-12 form-group input-group-sm">
                                                <input class="btn btn-primary btn-sm" type="submit" class="form-control" value="Pilih Pengiriman">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <strong>Total Harga Fix : </strong>
                    <h4>
                        <strong>
                            {{ "Rp " . number_format(($dto->ro_cost + $dto->total),2,',','.') }}
                        </strong>
                    </h4>

                    @if($dto->sudah_dibayar == 0)
                    <button class="btn btn-danger btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Belum Dibayar</button>
                    @elseif($dto->sudah_dibayar == 1)
                    <button class="btn btn-warning btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Cek Pembayaran</button>
                    @else
                    <button class="btn btn-success btn-sm disabled"><i class="fas fa-credit-card mr-2"> </i> Sudah Dibayar</button>
                    @endif

                    <hr>

                    <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#bayar{{ $dto->id }}" @if($dto->ro_cost < 1) disabled @endif><i class="fas fa-credit-card mr-2" aria-hidden="true"></i> Bayar</button>

                    <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#konfirm_bayar{{ $dto->id }}" @if($dto->ro_cost < 1) disabled @endif><i class="fas fa-credit-card mr-2" aria-hidden="true"></i> Konfirmasi Pembarayan</button>

                    <button class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#batal{{ $dto->id }}"><i class="fas fa-window-close mr-2" aria-hidden="true"></i> Batalkan Pesanan</button>


                    <div class="modal fade" id="konfirm_bayar{{ $dto->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title"><strong><i class="fas fa-credit-card mr-2" aria-hidden="true"></i> Pembayaran </strong></h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <form class="col" action="{{ url('sudah_bayar') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="col-12 text-center">
                                            <strong>Yakin sudah melakukan pembayaran pada produk BTK{{ $dto->id }}RK? Tekan "Sudah Bayar" agar segera kami proses!</strong>
                                            <div class="col-md-6 form-group input-group-sm" hidden>
                                                <label for="inpIdTransaksi">ID Bayar</label>
                                                <input type="text" class="form-control" placeholder="" value="{{ $dto->id }}" id="inpIdTransaksi" name="inpIdTransaksi">
                                            </div>

                                            <div class="col-md-12 form-group input-group-sm">
                                                <input class="btn btn-primary btn-sm" type="submit" class="form-control" value="Sudah Bayar">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="bayar{{ $dto->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title"><strong><i class="fas fa-credit-card mr-2" aria-hidden="true"></i> Pembayaran </strong></h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <form class="col" action="{{ url('bayar_pesanan') }}" method="POST" target="_blank">
                                        @csrf
                                        @method('POST')
                                        <div class="col-12 text-center">
                                            <strong>Yakin akan melakukan pembayaran pada produk BTK{{ $dto->id }}RK? Tekan "Bayar Sekarang" untuk melakukan pembayaran!</strong>
                                            <div class="col-md-6 form-group input-group-sm" hidden>
                                                <label for="inpIdTransaksi">ID Bayar</label>
                                                <input type="text" class="form-control" placeholder="" value="{{ $dto->id }}" id="inpIdTransaksi" name="inpIdTransaksi">
                                            </div>

                                            <div class="col-md-12 form-group input-group-sm">
                                                <input class="btn btn-primary btn-sm" type="submit" class="form-control" value="Bayar Sekarang">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="batal{{ $dto->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title"><strong><i class="fas fa-credit-card mr-2" aria-hidden="true"></i> Batalkan Pesanan </strong></h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <form class="col" action="{{ url('batal_pesanan') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="col-12 text-center">
                                            <strong>Yakin akan membatalkan pesanan pada produk BTK{{ $dto->id }}RK? Tekan "Batalkan" untuk melakukan pembatalan pesanan!</strong>
                                            <div class="col-md-6 form-group input-group-sm" hidden>
                                                <label for="inpIdTransaksi">ID Bayar</label>
                                                <input type="text" class="form-control" placeholder="" value="{{ $dto->id }}" id="inpIdTransaksi" name="inpIdTransaksi">
                                            </div>

                                            <div class="col-md-12 form-group input-group-sm">
                                                <input class="btn btn-danger btn-sm" type="submit" class="form-control" value="Batalkan">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endif

                <!--proses-->
                @if($posisi == 'diproses')
                <div class="card-body">
                    <strong>Pesanan Sedang Diproses!</strong>
                    <p class="text-danger">
                        Pesanan anda dalam proses produksi oleh tim kami. Tekan tombol dibawah untuk mengetahui proses produksi produk anda.
                    </p>

                    <!-- <button class="btn btn-sm btn-success"><i class="fab fa-whatsapp mr-2"> </i> Lihat Detail</button> -->

                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{ $dto->id }}"><i class="fas fa-clipboard-list mr-2" aria-hidden="true"></i> Lihat Detail</button>

                    <div class="modal fade" id="detail{{ $dto->id }}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title"><strong><i class="fas fa-credit-card mr-2" aria-hidden="true"></i> Proses Produksi </strong></h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">

                                    <div class="container py-2 mb-4">
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($dto->log_proses as $dt)
                                        <div class="row">
                                            <!-- timeline item 1 left dot -->
                                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                                <div class="row h-50">
                                                    <div class="col @if($no != 1) border-right @endif ">&nbsp;</div>
                                                    <div class="col">&nbsp;</div>
                                                </div>
                                                <h5 class="m-2">
                                                    <span class="badge badge-pill @if($dto->id_proses == $dt->id_proses) bg-success @else bg-warning @endif border">&nbsp;</span>
                                                </h5>
                                                <div class="row h-50">
                                                    <div class="col @if($no != count($dto->log_proses) && count($dto->log_proses) != 1) border-right @endif ">&nbsp;</div>
                                                    <div class="col">&nbsp;</div>
                                                </div>
                                            </div>
                                            <!-- timeline item 1 event content -->
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="">
                                                            {{ $dt->updated_at }}
                                                        </div>
                                                        <p class="card-text">
                                                            <strong>
                                                                {{ $dt->nama_proses }}
                                                            </strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <strong hidden>{{ $no++ }}</strong>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endif

                <!--dikemas-->
                @if($posisi == 'dikemas')
                <div class="card-body">
                    <strong>Pesanan Sedang Dikemas!</strong>
                    <p class="text-primary">
                        Pesanan anda dalam proses pengemasan oleh tim kami.
                    </p>
                </div>
                @endif

                <!--dikirim-->
                @if($posisi == 'dikirim')
                <div class="card-body">
                    <strong>Pesanan Sedang Dikirim!</strong>
                    <p class="text-primary">
                        Pesanan anda dalam proses mengiriman oleh tim kami. Tekan tombol dibawah untuk melacak pengiriman.
                    </p>

                    <strong>Resi: @if($dto->resi != null) {{ $dto->resi }} @else - @endif <br>Expedisi: {{ $dto->ro_code }}</strong>
                    <br>
                    <a href="https://everpro.id/cek-resi/" target="_blank" class="btn btn-sm btn-success mt-2"><i class="fa fa-truck mr-2"> </i> Lacak Produk</a>
                </div>
                @endif

                @if($posisi == 'selesai')
                <!--selesai-->
                <div class="card-body">
                    <strong>Pesanan Telah Diterima</strong>
                    <p class="text-primary">
                        Pesanan anda telah diserahkan ke penerima. Anda dapat memberikan review dan komentar dengan menekan tombol dibawah.
                    </p>

                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#review{{ $dto->id }}"><i class="far fa-star mr-2" aria-hidden="true"></i> Beri Review</button>

                    <div class="modal fade" id="review{{ $dto->id }}">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title"><strong><i class="far fa-star mr-2" aria-hidden="true"></i> Beri Review </strong></h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <form class="col" action="{{ route('review.update', $dto->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">

                                            <!-- <div class="col-md-6 form-group input-group-sm">
                                                <label for="inpIdTransaksi">ID Bayar</label>
                                                <input type="text" class="form-control" placeholder="" value="{{ $dto->id }}" id="inpIdTransaksi" name="inpIdTransaksi">
                                            </div> -->

                                            <div class="col-md-12 form-group input-group-sm">
                                                <label for="inpKomentar">Beri Review</label>
                                                <textarea type="text" class="form-control" placeholder="" id="inpKomentar" name="inpKomentar">{{ $dto->komentar }}</textarea>
                                            </div>

                                            <div class="col-md-12 form-group input-group-sm">
                                                <input class="btn btn-primary btn-sm" type="submit" class="form-control" value="Simpan Review">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endif

                <!--dibatalkan-->
                @if($posisi == 'dibatalkan')
                <div class="card-body">
                    <strong>Pesanan Dibatalkan!</strong>
                    <p class="text-danger">
                        Pesanan anda dibatalkan pada tanggal {{ $dto->updated_at }}
                    </p>
                </div>
                @endif

            </div>
        </div>

        <hr>

        @endforeach
    </div>
</div>
@endsection