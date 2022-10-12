<?php

namespace App\Http\Controllers;

use App\Models\Teknik;
use Illuminate\Http\Request;

class TeknikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Teknik';
        $sub_title = 'Kelola Data Teknik!';

        $teknik = Teknik::all();

        return view('content.teknik.index', compact(
            'teknik',
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
        $title = 'Teknik';
        $sub_title = 'Tambah Data Jenis Teknik!';

        return view('content.teknik.create', compact(
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

        $teknik = Teknik::create([
            'nama' => $request->inpNama,
            'biaya' => $request->inpBiaya
        ]);

        return redirect()->route('teknik.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Teknik';
        $sub_title = 'Edit Data Teknik!';

        $teknik = Teknik::find($id);
        return view('content.teknik.edit', compact(
            'teknik',
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

        $teknik = Teknik::findOrFail($id);
        $teknik->update($dataUp);
        return redirect()->route('teknik.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teknik = Teknik::find($id);
        $teknik->delete();
        return redirect()->route('teknik.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
