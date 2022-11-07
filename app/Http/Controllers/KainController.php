<?php

namespace App\Http\Controllers;

use App\Models\Kain;
use Illuminate\Http\Request;

class KainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Kain';
        $sub_title = 'Kelola Data Kain!';

        $kain = Kain::all();

        return view('content.kain.index', compact(
            'kain',
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
        $title = 'Kain';
        $sub_title = 'Tambah Data Jenis Kain!';

        return view('content.kain.create', compact(
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
            'inpBerat' => 'required',
            'inpBiaya' => 'required'
        ]);

        $kain = Kain::create([
            'nama' => $request->inpNama,
            'berat' => $request->inpBerat,
            'biaya' => $request->inpBiaya
        ]);

        return redirect()->route('kain.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Kain';
        $sub_title = 'Edit Data Kain!';

        $kain = Kain::find($id);
        return view('content.kain.edit', compact(
            'kain',
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
            'inpBerat' => 'required',
            'inpBiaya' => 'required'
        ]);

        $dataUp['nama'] = $request->inpNama;
        $dataUp['berat'] = $request->inpBerat;
        $dataUp['biaya'] = $request->inpBiaya;

        $kain = Kain::findOrFail($id);
        $kain->update($dataUp);
        return redirect()->route('kain.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kain = Kain::find($id);
        $kain->delete();
        return redirect()->route('kain.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
