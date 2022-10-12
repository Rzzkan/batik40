<?php

namespace App\Http\Controllers;

use App\Models\Proses;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Proses';
        $sub_title = 'Kelola Data Proses!';

        $proses = Proses::all();

        return view('content.proses.index', compact(
            'proses',
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
        $title = 'Proses';
        $sub_title = 'Tambah Data Jenis Proses!';

        return view('content.proses.create', compact(
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
            'inpNama' => 'required'
        ]);

        $proses = Proses::create([
            'nama' => $request->inpNama
        ]);

        return redirect()->route('proses.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Proses';
        $sub_title = 'Edit Data Proses!';

        $proses = Proses::find($id);
        return view('content.proses.edit', compact(
            'proses',
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
            'inpNama' => 'required'
        ]);

        $dataUp['nama'] = $request->inpNama;

        $proses = Proses::findOrFail($id);
        $proses->update($dataUp);
        return redirect()->route('proses.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proses = Proses::find($id);
        $proses->delete();
        return redirect()->route('proses.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
