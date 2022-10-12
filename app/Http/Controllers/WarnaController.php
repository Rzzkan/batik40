<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use Illuminate\Http\Request;

class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Warna';
        $sub_title = 'Kelola Data Warna!';

        $warna = Warna::all();

        return view('content.warna.index', compact(
            'warna',
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
        $title = 'Warna';
        $sub_title = 'Tambah Data Jenis Warna!';

        return view('content.warna.create', compact(
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
            'inpNama' => 'required',
            'inpBiaya' => 'required'
        ]);

        $warna = Warna::create([
            'nama' => $request->inpNama,
            'biaya' => $request->inpBiaya
        ]);

        return redirect()->route('warna.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Warna';
        $sub_title = 'Edit Data Warna!';

        $warna = Warna::find($id);
        return view('content.warna.edit', compact(
            'warna',
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
            'inpNama' => 'required',
            'inpBiaya' => 'required'
        ]);

        $dataUp['nama'] = $request->inpNama;
        $dataUp['biaya'] = $request->inpBiaya;

        $warna = Warna::findOrFail($id);
        $warna->update($dataUp);
        return redirect()->route('warna.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warna = Warna::find($id);
        $warna->delete();
        return redirect()->route('warna.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
