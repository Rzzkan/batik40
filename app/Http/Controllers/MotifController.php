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
    public function index(Request $request)
    {
        $title = 'Motif Dasar';
        $sub_title = 'Data Motif Dasar';

        $search = $request->input('search');

        $motif = DB::table('tbl_motif as s')
            ->leftJoin(
                DB::raw('(SELECT hs.motif_id, GROUP_CONCAT(h.karakter_nama SEPARATOR ", ") as 
                karakter FROM jtbl_motif_karakter as hs LEFT JOIN tbl_karakter as h ON hs.karakter_id = h.karakter_id GROUP BY hs.motif_id) as sh'),
                's.motif_id',
                '=',
                'sh.motif_id'
            )
            ->when($search, function ($query, $search) {
                return $query->whereRaw("sh.karakter like '%$search%'");
            })
            ->select('s.motif_nama', 's.motif_file', 'sh.karakter')
            ->paginate(10);

        $request->session()->put('search', $search);

        $motif->appends(['search' => $search]);

        return view('customer.motif.index', compact(
            'motif',
            'title',
            'sub_title',
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
