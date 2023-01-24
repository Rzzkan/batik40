<?php

namespace App\Http\Controllers;

use App\Models\HasilDesainModel;
use Illuminate\Http\Request;

class HasilDesainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Hasil Desain';
        $sub_title = 'Data Hasil Desain';

        $hasil_desain = HasilDesainModel::where('id_customer', auth()->user()->id)->get();

        return view('customer.hasil_desain.index', compact(
            'hasil_desain',
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
        $title = 'Hasil Desain';
        $sub_title = 'Tambah Data Hasil Desain';

        return view('customer.hasil_desain.create', compact(
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
            'hasilbatik_namakarya' => 'required',
            'hasilbatik_file' => 'required',
            'hasilbatik_widthCanv' => 'required',
            'hasilbatik_heightCanv' => 'required',
        ]);

        if ($file = $request->hasFile('hasilbatik_file')) {
            $file = $request->file('hasilbatik_file');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/desain';
            $file->move($destinationPath, $fileName);
            $simpan_desain = 'desain/' . $fileName;
        }

        $hasil_batik = HasilDesainModel::create([
            'hasilbatik_namakarya' => $request->hasilbatik_namakarya,
            'hasilbatik_file' => $simpan_desain,
            'hasilbatik_widthCanv' => $request->hasilbatik_widthCanv,
            'hasilbatik_heightCanv' => $request->hasilbatik_heightCanv,
            'id_customer' => auth()->user()->id,
        ]);

        return redirect()->route('hasil_desain.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        // $hasil_desain = HasilDesainModel::where('hasilbatik_id' => $id)->first();

        // $whereArray = array('hasilbatik_id' => $id);

        $hasil_desain = HasilDesainModel::where('hasilbatik_id', $id);
        $hasil_desain->delete();

        return redirect()->route('hasil_desain.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
