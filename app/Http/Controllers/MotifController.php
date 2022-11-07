<?php

namespace App\Http\Controllers;

use App\Models\MotifKarakterModel;
use App\Models\MotifModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Motif Dasar';
        $sub_title = 'Data Motif Dasar';

        $motif = MotifModel::all();
        $karakter = DB::table('jtbl_motif_karakter')
            ->select('jtbl_motif_karakter.*', 'tbl_karakter.karakter_nama as nama_karakter')
            ->leftJoin('tbl_karakter', 'jtbl_motif_karakter.karakter_id', '=', 'tbl_karakter.karakter_id')
            ->get();

        return view('customer.motif.index', compact(
            'motif',
            'karakter',
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
        //
    }
}
