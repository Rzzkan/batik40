<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Validasi Harga';
        $sub_title = 'Kelola Validasi Harga!';

        $validasi = Transaksi::all();

        return view('content.validasi.index', compact(
            'validasi',
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
        $title = 'Validasi Harga';
        $sub_title = 'Edit Validasi Harga!';

        $validasi = Transaksi::with('produks')->find($id);
        return view('content.validasi.edit', compact(
            'validasi',
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
            'inpTotal' => 'required',
            'inpStatus' => 'required'
        ]);

        $dataUp['total'] = $request->inpTotal;
        $dataUp['status'] = $request->inpStatus;

        $validasi = Transaksi::findOrFail($id);
        $validasi->update($dataUp);
        return redirect()->route('validasi.index')->with(['success' => 'Data Berhasil Disimpan']);
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
