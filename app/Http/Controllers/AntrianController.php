<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Mesin;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Antrian';
        $sub_title = 'Kelola Data Antrian!';

        // $antrian = Antrian::all();
        $antrian = DB::table('mesin')
            ->select('mesin.*', DB::raw('COALESCE(SUM(antrian.status),0) as jumlah_antrian'))
            ->leftJoin('antrian', 'mesin.id', '=', 'antrian.id_mesin')
            ->groupBy('mesin.id')
            ->get();

        return view('content.antrian.index', compact(
            'antrian',
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
        $title = 'Antrian';
        $sub_title = 'Tambah Antrian!';

        return view('content.antrian.create', compact(
            'title',
            'sub_title'
        ));
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
            'inpIdMesin' => 'required',
            'inpIdTransaksi' => 'required'
        ]);

        $antrian = Antrian::create([
            'id_mesin' => $request->inpIdMesin,
            'id_transaksi' => $request->inpIdTransaksi,
            'status' => 1
        ]);

        $dataUp['status'] = 'proses';
        $dataUp['status_pengiriman'] = 'diproses';

        $transaksi = Transaksi::findOrFail($request->inpIdTransaksi);
        $transaksi->update($dataUp);

        $dataUpMesin['status'] = 'Bekerja';

        $mesin = Mesin::findOrFail($request->inpIdMesin);
        $mesin->update($dataUpMesin);

        return redirect()->route('antrian.show', $request->inpIdMesin)->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Antrian';
        $sub_title = 'Kelola Detail Antrian!';

        // $antrian = Antrian::all();
        $detail_antrian = DB::table('antrian')
            ->select('antrian.*', 'transaksi.status as status_transaksi')
            ->leftJoin('transaksi', 'antrian.id_transaksi', '=', 'transaksi.id')
            ->where('antrian.id_mesin', '=', $id)
            ->orderBy('id', 'DESC')
            ->get();

        $transaksi_siap = Transaksi::where('status', '=', 'siap_diantrikan')->orderBy('id', 'DESC')->get();
        $detail_mesin = Mesin::where('id', '=', $id)->first();

        return view('content.antrian.detail', compact(
            'detail_mesin',
            'transaksi_siap',
            'detail_antrian',
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
        $title = 'Antrian';
        $sub_title = 'Edit Data Antrian!';

        $antrian = Antrian::find($id);
        $detail_mesin = Mesin::where('id', '=', $antrian->id_mesin)->first();
        $detail_transaksi = Transaksi::where('id', '=', $antrian->id_transaksi)->first();
        $transaksi_siap = Transaksi::All()->where('status', '=', 'siap_diantrikan');

        return view('content.antrian.edit', compact(
            'detail_mesin',
            'detail_transaksi',
            'transaksi_siap',
            'antrian',
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
            'inpIdTransaksi' => 'required',
            'inpStatus' => 'required'
        ]);

        $dataUp['id_transaksi'] = $request->inpIdTransaksi;
        $dataUp['status'] = $request->inpStatus;

        $antrian = Antrian::findOrFail($id);
        $antrian->update($dataUp);

        $jumlah_antrian = DB::table('mesin')
            ->select('mesin.*', DB::raw('COALESCE(SUM(antrian.status),0) as jumlah_antrian'))
            ->leftJoin('antrian', 'mesin.id', '=', 'antrian.id_mesin')
            ->where('mesin.id', $antrian->id_mesin)
            ->first();

        if ($jumlah_antrian->jumlah_antrian > 0) {
            $dataUpMesin['status'] = 'Bekerja';
        } else {
            $dataUpMesin['status'] = 'Idle';
        }

        $mesin = Mesin::findOrFail($antrian->id_mesin);
        $mesin->update($dataUpMesin);

        return redirect()->route('antrian.show', $antrian->id_mesin)->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $antrian = Antrian::find($id);
        $detail_antrian = Antrian::where('id', '=', $id)->first();

        $dataUp['status'] = 'siap_diantrikan';
        $transaksi = Transaksi::findOrFail($detail_antrian->id_transaksi);

        $transaksi->update($dataUp);
        $antrian->delete();
        return redirect()->route('antrian.show', $detail_antrian->id_mesin)->with(['success' => 'Data Berhasil Dihapus']);
    }
}
