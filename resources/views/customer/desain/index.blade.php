@extends('layouts.default')
@section('content')
<div class="page-inner mt-2">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session('success') }}
            </div>
            @endif
            <div class="card">
                <!-- <div class="card-header">
                    <div class="card-head-row">
                        <strong><i class="fas fa-align-left mr-2"> </i> Data Hasil Desain</strong><a href="{{ url()->previous() }}" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-left mr-2"> </i> Back</a>
                    </div>
                </div> -->
                <div class="card-body">
                    <h3><strong>SELAMAT DATANG!</strong></h3>
                    <p>Untuk memulai desain silakan tentukan ukuran kanvas dan pilih jenis pola yang tersedia</p>
                    <hr>
                    <form class="m-2" method="POST" action="{{ route('alamat.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group input-group-sm">
                                <label for="penerima">Ukuran Kanvas</label>
                                <select class="form-control" name="algoritma" id="input-algoritma" value="" onchange=" gantiUkuran(this)">
                                    <option value="default">Default (200cm x 115cm)</option>
                                    <option value="jarik">Kain Jarik (250cm x 100cm)</option>
                                    <option value="sarung">Kain Sarung (180cm x 100cm)</option>
                                    <option value="dodot">Kain Dodot (400cm x 200cm)</option>
                                    <option value="selendang">Kain Selendang (140cm x 45cm)</option>
                                    <option value="kembem">Kain Kembem (250cm x 50cm)</option>
                                    <option value="costum">Costum</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="no_hp">Jenis Member</label>
                                <input type="text" class="form-control" placeholder="" id="no_hp" value="Lama" name="no_hp" readonly>
                            </div>

                            <div class="col-md-6 form-group input-group-sm">
                                <label for="alias">Pola</label>
                                <select class="form-control" name="algoritma" id="input-algoritma" value="" onchange=" gantiIlustrasi(this)">
                                    <option value="berderet">berderet</option>
                                    <option value="kotak">kotak</option>
                                    <option value="spiral">spiral</option>
                                </select>
                                <br>
                                [ <span id="jmlsubmotif">3</span> ] Pilihan Submotif Maksimal
                                <br>
                                <img id="ilustrasimotif" style="height:120px; margin-top:10px; margin-side: auto;" src="{{ asset('customer') }}/img/_Ilustrasi Berderet.png"></img>

                            </div>

                            <div class="col-md-12 form-group input-group-sm">
                                <button class="btn btn-primary btn-sm" type="submit" class="form-control">Mulai Desain</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // change status background
    var checkProcessStatus = document.getElementById("order-status");
    console.log(checkProcessStatus.innerHTML);
    if (checkProcessStatus.innerHTML == "Status pesanan : daftar tunggu") {
        checkProcessStatus.style.background = "#f79423";
    }

    function gantiUkuran(target) {
        var kain = target.value;
        document.getElementById('inputpanjang').style = "display:none;";
        document.getElementById('inputlebar').style = "display:none;";
        switch (kain) {
            case "default":
                panjang = 200;
                lebar = 115;
                break;
            case "jarik":
                panjang = 250;
                lebar = 100;
                break;
            case "sarung":
                panjang = 180;
                lebar = 100;
                break;
            case "dodot":
                panjang = 400;
                lebar = 200;
                break;
            case "selendang":
                panjang = 140;
                lebar = 45;
                break;
            case "kembem":
                panjang = 250;
                lebar = 50;
                break;
            case "costum":
                document.getElementById('inputpanjang').style = "";
                document.getElementById('inputlebar').style = "";
                panjang = "";
                lebar = "";
                break;
            default:
                file = '_Ilustrasi Berderet';
        }
        document.getElementById('widthCanv').value = panjang;
        document.getElementById('heightCanv').value = lebar;
    }

    function gantiIlustrasi(target) {
        var ilustrasi = target.value;
        switch (ilustrasi) {
            case "berderet":
                file = '_Ilustrasi Berderet';
                jmlsubmotif = 3;
                break;
            case "kotak":
                file = '_Ilustrasi Kotak';
                jmlsubmotif = 2;
                break;
            case "spiral":
                file = '_Ilustrasi Spiral';
                jmlsubmotif = 2;
                break;
            default:
                file = '_Ilustrasi Berderet';
        }
        document.getElementById('ilustrasimotif').setAttribute("src", "{{ asset('customer/img') }}" + "/" + file + ".png");
        document.getElementById('jmlsubmotif').innerHTML = jmlsubmotif;
    }
</script>

@endsection