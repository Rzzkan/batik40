<?php

namespace App\Http\Controllers;

use App\Models\Biaya_mesin;
use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Mesin';
        $sub_title = 'Kelola Data Mesin!';

        $mesin = Mesin::all();
        $biaya_mesin = Biaya_mesin::first();

        return view('content.mesin.index', compact(
            'mesin',
            'biaya_mesin',
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
        $title = 'Mesin';
        $sub_title = 'Tambah Data Jenis Mesin!';

        return view('content.mesin.create', compact(
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
            'inpKode' => 'required'
        ]);

        $mesin = Mesin::create([
            'nama' => $request->inpNama,
            'kode' => $request->inpKode,
            'status' => 'Bekerja'
        ]);

        return redirect()->route('mesin.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Mesin';
        $sub_title = 'Edit Data Mesin!';

        $mesin = Mesin::find($id);
        return view('content.mesin.edit', compact(
            'mesin',
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
            'inpKode' => 'required',
            'inpStatus' => 'required'
        ]);

        $dataUp['nama'] = $request->inpNama;
        $dataUp['kode'] = $request->inpKode;
        $dataUp['status'] = $request->inpStatus;

        $mesin = Mesin::findOrFail($id);
        $mesin->update($dataUp);
        return redirect()->route('mesin.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mesin = Mesin::find($id);
        $mesin->delete();
        return redirect()->route('mesin.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
