@extends('layouts.default')
@section('content')
<div class="page-inner mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-clipboard-check mr-2"> </i> Panduan </strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <strong>Pilihlah Submotif yang anda inginkan: </strong>
                    <ul>
                        <li>Untuk memulai memilih silahkan tekan gambar tambah.</li>
                        <li>motif di panel kiri.</li>
                        <li>Setiap Submotif memiliki kata kunci karakter untuk membantu anda
                            menyesuaikan ide yang dimiliki dengan makna dari submotif.</li>

                        <li>Perhatikan jumlah submotif maksimal yang dapat dipilih.</li>
                        <ol>
                            <li>Pola “berderet” maksimal 3 submotif</li>
                            <li>Pola “kotak” maksimal 2 submotif</li>
                            <li>Pola “spiral” maksimal 2 submotif</li>
                        </ol>
                    </ul>
                    <strong>Atur parameter sesuai keinginan pada panel kiri</strong>
                    <ul>
                        <li>Pengaturan peramere hanaya bisa dilakukan setelah memilih submotif</li>
                    </ul>

                    <strong>Simpan hasil desain anda apabila sudah puas dengan desain</strong>
                    <ul>
                        <li>Tekan tombol simpan batik di panel kiri</li>
                        <li>Anda akan dialihkan ke halaman penyimpanan dan anda akan diminta</li>
                        <li>memberi judul karya dan menuliskan nama anda</li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection