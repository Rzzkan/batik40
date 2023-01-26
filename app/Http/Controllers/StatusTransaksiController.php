<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class StatusTRansaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'Status Transaksi';
        $sub_title = 'Kelola Status Transaksi!';

        $transaksi = Transaksi::select('transaksi.*', 'users.name as nama_user', 'users.email as email_user')
            ->leftJoin('users', 'users.id', '=', 'transaksi.id_user')
            ->orderBy('id', 'DESC')
            ->with('produks', 'alamat')->get();

        return view('content.status_transaksi.index', compact(
            'transaksi',
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
        $title = 'Status Transaksi';
        $sub_title = 'Edit Status Transaksi!';

        $transaksi = Transaksi::find($id);
        return view('content.status_transaksi.edit', compact(
            'transaksi',
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
        if ($request->inpStatusTransaksi != null) {
            $dataUp['status_pengiriman'] = $request->inpStatusTransaksi;
        }

        if ($request->inpResi != null) {
            $dataUp['resi'] = $request->inpResi;
        }

        if ($request->inpStatusPembayaran != null) {
            $dataUp['sudah_dibayar'] = $request->inpStatusPembayaran;
            // if ($request->inpStatusPembayaran == 2) {
            //     $dataUp['status_pengiriman'] = 'diproses';
            // }
        }

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($dataUp);

        return redirect()->route('status_transaksi.index')->with(['success' => 'Data Berhasil Disimpan.']);
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
