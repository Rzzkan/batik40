<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Log_proses;
use App\Models\Mesin;
use App\Models\Proses;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Proses Produksi';
        $sub_title = 'Kelola Proses Produksi!';

        $produksi = DB::table('transaksi')
            ->select('transaksi.*', 'proses.nama as nama_proses')
            ->leftJoin('proses', 'transaksi.id_proses', '=', 'proses.id')
            ->orderBy('id', 'DESC')
            ->get();

        return view('content.produksi.index', compact(
            'produksi',
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Proses Produksi';
        $sub_title = 'Edit Proses Produksi!';

        $produksi = DB::table('transaksi')
            ->select('transaksi.*', 'proses.nama as nama_proses')
            ->leftJoin('proses', 'transaksi.id_proses', '=', 'proses.id')
            ->where('transaksi.id', '=', $id)
            ->first();

        $proses = Proses::where('id', '!=', $produksi->id_proses)->get();
        $log_proses = DB::table('log_proses')
            ->select('log_proses.*', 'proses.nama as nama_proses')
            ->leftJoin('proses', 'log_proses.id_proses', '=', 'proses.id')
            ->where('log_proses.id_transaksi', '=', $id)
            ->orderBy('log_proses.id', 'DESC')
            ->get();

        return view('content.produksi.edit', compact(
            'log_proses',
            'proses',
            'produksi',
            'title',
            'sub_title'
        ));
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
            'inpIdProses' => 'required'
        ]);

        $dataUp['id_proses'] = $request->inpIdProses;

        // echo $request->inpSelesai;
        // die();

        $id_antrian =  Antrian::where('id_transaksi', $id)->first()->id;
        $produksiAntrian = Antrian::findOrFail($id_antrian);

        if ($request->inpSelesai == '1') {
            $dataUp['status'] = 'selesai';
            $dataUpAntrian['status'] = 0;
            $produksiAntrian->update($dataUpAntrian);
        }

        $log_proses = Log_proses::create([
            'id_transaksi' => $id,
            'id_proses' => $request->inpIdProses
        ]);

        $produksi = Transaksi::findOrFail($id);
        $produksi->update($dataUp);


        $jumlah_antrian = DB::table('mesin')
            ->select('mesin.*', DB::raw('COALESCE(SUM(antrian.status),0) as jumlah_antrian'))
            ->leftJoin('antrian', 'mesin.id', '=', 'antrian.id_mesin')
            ->where('mesin.id', $produksiAntrian->id_mesin)
            ->first();

        if ($jumlah_antrian->jumlah_antrian > 0) {
            $dataUpMesin['status'] = 'Bekerja';
        } else {
            $dataUpMesin['status'] = 'Idle';
        }

        $mesin = Mesin::findOrFail($produksiAntrian->id_mesin);
        $mesin->update($dataUpMesin);

        return redirect()->route('produksi.edit', $id)->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log_proses = Log_proses::find($id);

        $id_transaksi = $log_proses->id_transaksi;

        $log_proses->delete();

        $new_log_proses = Log_proses::where('id_transaksi', '=', $id_transaksi)
            ->orderBy('id', 'DESC')
            ->first();

        $dataUp['id_proses'] = $new_log_proses->id_proses;
        $produksi = Transaksi::findOrFail($id_transaksi);
        $produksi->update($dataUp);

        return redirect()->route('produksi.edit', $id_transaksi)->with(['success' => 'Data Berhasil Dihapus']);
    }
}
