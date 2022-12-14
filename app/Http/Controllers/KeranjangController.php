<?php

namespace App\Http\Controllers;

use App\Models\AlamatModel;
use App\Models\Biaya_mesin;
use App\Models\Kain;
use App\Models\KeranjangModel;
use App\Models\Teknik;
use App\Models\Warna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Keranjang';
        $sub_title = 'Kelola Data Keranjang!';

        // $get_data = KeranjangModel::all();

        $get_data = DB::table('keranjang')
            ->select(
                'keranjang.*',
                'tbl_hasilbatik.hasilbatik_file as file_batik',
                'tbl_hasilbatik.hasilbatik_namakarya as nama_batik',
                'tbl_hasilbatik.hasilbatik_widthCanv as lebar_kain',
                'tbl_hasilbatik.hasilbatik_heightCanv as tinggi_kain',
                'warna.nama as nama_warna',
                'warna.biaya as biaya_warna',
                'teknik.nama as nama_teknik',
                'teknik.biaya as biaya_teknik',
                'kain.nama as nama_kain',
                'kain.biaya as biaya_kain',
                'kain.berat as berat_kain'
            )
            ->leftJoin('tbl_hasilbatik', 'tbl_hasilbatik.hasilbatik_id', '=', 'keranjang.id_hasil_desain')
            ->leftJoin('warna', 'warna.id', '=', 'keranjang.id_warna')
            ->leftJoin('teknik', 'teknik.id', '=', 'keranjang.id_teknik')
            ->leftJoin('kain', 'kain.id', '=', 'keranjang.id_kain')
            ->where('id_user', auth()->user()->id)
            ->get();

        $warna = Warna::all();
        $kain = Kain::all();
        $teknik = Teknik::all();
        $alamat = AlamatModel::where('id_user', auth()->user()->id)->get();

        return view('customer.keranjang.index', compact(
            'alamat',
            'warna',
            'kain',
            'teknik',
            'get_data',
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
            'inpIdDesain' => 'required'
        ]);

        $cek_keranjang = KeranjangModel::where('id_user', '=', auth()->user()->id)
            ->where('id_hasil_desain', '=', $request->inpIdDesain)
            ->where('status', '!=', 2)
            ->first();

        // $jumlah_cek = $cek_keranjang->count();

        $biaya_mesin = Biaya_mesin::first();

        $biaya_mesin_fix = 0;

        if (auth()->user()->member == 1) {
            $biaya_mesin_fix = $biaya_mesin['member'];
        } else {
            $biaya_mesin_fix = $biaya_mesin['non_member'];
        }

        if ($cek_keranjang) {
            $dataUp['jumlah'] = $cek_keranjang['jumlah'] + 1;

            $keranjang = KeranjangModel::findOrFail($cek_keranjang['id']);
            $keranjang->update($dataUp);
        } else {
            $keranjang = KeranjangModel::create([
                'id_user' => auth()->user()->id,
                'id_hasil_desain' => $request->inpIdDesain,
                'biaya_mesin' => $biaya_mesin_fix,
                'jumlah' => 1,
            ]);
        }

        return redirect()->route('hasil_desain.index')->with(['success' => 'Data Berhasil Disimpan. Lihat Detail di Keranjang!']);
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
        $this->validate($request, [
            'inpWarna' => 'required',
            'inpTeknik' => 'required',
            'inpKain' => 'required',
            'inpJumlah' => 'required',
        ]);

        $dataUp['jumlah'] = $request->inpJumlah;
        $dataUp['status'] = $request->inpStatus;
        $dataUp['id_warna'] = $request->inpWarna;
        $dataUp['id_teknik'] = $request->inpTeknik;
        $dataUp['id_kain'] = $request->inpKain;

        $keranjang = KeranjangModel::findOrFail($id);
        $keranjang->update($dataUp);

        return redirect()->route('keranjang.index')->with(['success' => 'Data Berhasil Disimpan.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = KeranjangModel::find($id);
        $keranjang->delete();
        return redirect()->route('keranjang.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
