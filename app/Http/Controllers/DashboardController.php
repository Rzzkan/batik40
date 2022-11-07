<?php

namespace App\Http\Controllers;

use App\Models\HasilDesainModel;
use App\Models\Kain;
use App\Models\Mesin;
use App\Models\Teknik;
use App\Models\Transaksi;
use App\Models\Warna;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $sub_title = 'Mudah Membuat Batik di Sini!';

        $jumlah_mesin = Mesin::count();
        $jumlah_warna = Warna::count();
        $jumlah_teknik = Teknik::count();
        $jumlah_kain = Kain::count();
        $data_menunggu = Transaksi::where('status', '=', 'menunggu')->get();
        $data_antrian = Mesin::where('status', '=', 'idle')->get();
        $data_proses = Transaksi::where('status', '=', 'proses')->get();
        $data_selesai = Transaksi::where('status', '=', 'selesai')->get();

        $transaksi_selesai = Transaksi::where('status_pengiriman', '=', 'selesai')->where('id_user', auth()->user()->id)->get();
        $pesanan_menunggu = Transaksi::where('status_pengiriman', '=', 'validasi')->where('id_user', auth()->user()->id)->get();
        $desain_dibuat = HasilDesainModel::where('id_customer', auth()->user()->id)->get();
        $pesanan_berjalan = Transaksi::where('status_pengiriman', '=', 'diproses')->where('id_user', auth()->user()->id)->get();

        return view('content.dashboard', compact(
            'transaksi_selesai',
            'pesanan_menunggu',
            'desain_dibuat',
            'pesanan_berjalan',
            'data_antrian',
            'data_menunggu',
            'data_proses',
            'data_selesai',
            'jumlah_mesin',
            'jumlah_warna',
            'jumlah_teknik',
            'jumlah_kain',
            'title',
            'sub_title'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
