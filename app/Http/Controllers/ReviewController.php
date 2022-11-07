<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Happy Customer';
        $sub_title = 'Data Happy Customer!';

        $get_data = Transaksi::where('id_user', auth()->user()->id)
            ->where('status_pengiriman', 'selesai')->orderBy('id', 'desc')->get();

        return view('customer.review.index', compact(
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
            // 'inpBintang' => 'required',
            'inpKomentar' => 'required',
        ]);

        // $dataUp['poin_bintang'] = $request->inpBintang;
        $dataUp['komentar'] =  $request->inpKomentar;

        // echo $request->inpKomentar;
        // die();

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($dataUp);

        return redirect()->route('review.index')->with(['success' => 'Data Berhasil Disimpan.']);
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
