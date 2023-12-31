<?php

namespace App\Http\Controllers;

use App\Models\AlamatModel;
use App\Models\Kain;
use App\Models\KeranjangModel;
use App\Models\Teknik;
use App\Models\Transaksi;
use App\Models\Warna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transaksi';
        $sub_title = 'Kelola Data Transaksi!';
        $posisi = 'validasi';

        $get_data = Transaksi::select('transaksi.*', 'alamat.id_kec as id_kec')
            ->leftJoin('alamat', 'alamat.id', '=', 'transaksi.id_alamat')
            ->where('transaksi.id_user', auth()->user()->id)
            ->where('transaksi.status_pengiriman', $posisi)
            ->orderBy('id', 'DESC')
            ->with('produks', 'log_proses')->get();

        return view('customer.transaksi.index', compact(
            'get_data',
            'posisi',
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
        $this->validate($request, [
            'inpTotal' => 'required',
            'inpAlamat' => 'required',
            'inpBerat' => 'required'
        ]);

        // echo $request->inpIdker;
        // die();

        $transaksi = Transaksi::create([
            'total' => $request->inpTotal + $request->inpBiayaEkstra,
            'id_alamat' => $request->inpAlamat,
            'status_pengiriman' => 'validasi',
            'id_user' => auth()->user()->id,
            'berat' => $request->inpBerat,
            // 'biaya_ekstra' => $request->inpBiayaEkstra
        ]);

        $idTran = $transaksi['id'];

        if ($idTran > 0) {
            $dapatIdKer = explode("--", $request->inpIdker);

            for ($u = 1; $u < count($dapatIdKer); $u++) {
                $dataUp['id_transaksi'] = $idTran;
                $dataUp['status'] = 2;

                $keranjang = KeranjangModel::findOrFail($dapatIdKer[$u]);
                $keranjang->update($dataUp);
            }
        }

        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Transaksi';
        $sub_title = 'Kelola Data Transaksi!';
        $posisi = $id;

        $get_data = Transaksi::select('transaksi.*', 'alamat.id_kec as id_kec')
            ->leftJoin('alamat', 'alamat.id', '=', 'transaksi.id_alamat')
            ->where('transaksi.id_user', auth()->user()->id)
            ->where('transaksi.status_pengiriman', $posisi)
            ->orderBy('id', 'DESC')
            ->with('produks', 'log_proses')->get();

        // echo $get_data;
        // die();

        return view('customer.transaksi.index', compact(
            'get_data',
            'posisi',
            'title',
            'sub_title'
        ));
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
        $this->validate($request, [
            'inpPengiriman' => 'required'
        ]);

        $transaksi = Transaksi::findOrFail($id);

        $pisah_pengiriman = explode("---", $request->inpPengiriman);
        $biaya_total = $transaksi->total;

        // echo $request->inpBiayaEkstra;
        // die();

        if ($transaksi->biaya_ekstra > 0) {
            if ($request->inpBiayaEkstra != null || $request->inpBiayaEkstra > 0) {
            } else {
                $biaya_total = $biaya_total - $transaksi->biaya_ekstra;
            }
        } else {
            if ($request->inpBiayaEkstra > 0) {
                $biaya_total = $biaya_total + $request->inpBiayaEkstra;
            }
        }

        $dataUp['ro_code'] = $pisah_pengiriman[0];
        $dataUp['ro_name'] = $pisah_pengiriman[1];
        $dataUp['ro_service'] = $pisah_pengiriman[2];
        $dataUp['ro_description'] = $pisah_pengiriman[3];
        $dataUp['ro_cost'] = $pisah_pengiriman[4];
        $dataUp['ro_etd'] = $pisah_pengiriman[5];
        $dataUp['biaya_ekstra'] = $request->inpBiayaEkstra;
        $dataUp['total'] = $biaya_total;

        $transaksi->update($dataUp);

        return redirect()->route('transaksi.show', $transaksi->status_pengiriman)->with(['success' => 'Data Berhasil Disimpan.']);
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
