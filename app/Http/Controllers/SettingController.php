<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Setting';
        $sub_title = 'Kelola Data Setting!';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 8687aea0761d3394d93f7f157af8adc6"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $data = null;

        if ($err) {
            $data =  $err;
        } else {
            $data = $response;
        }

        $data_prov = json_decode($data, true)['rajaongkir']['results'];


        $setting = SettingModel::first();

        return view('content.setting.index', compact(
            'data_prov',
            'setting',
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
            // 'inpKecToko' => 'required',
            'inpUrlDesain' => 'required'
        ]);

        $dataUp['base_url_img_desain_batik'] = $request->inpUrlHasilDesain;
        $dataUp['url_desain'] = $request->inpUrlDesain;
        $dataUp['no_toko'] = $request->inpNomor;

        $dataUp['id_prov_toko'] = explode("---", $request->id_prov_toko)[0];
        $dataUp['id_kab_toko'] = explode("---", $request->id_kab_toko)[0];
        $dataUp['id_kec_toko'] = explode("---", $request->id_kec_toko)[0];
        $dataUp['nama_prov_toko'] = $request->nama_prov_toko;
        $dataUp['nama_kab_toko'] = $request->nama_kab_toko;
        $dataUp['nama_kec_toko'] = $request->nama_kec_toko;

        $setting = SettingModel::findOrFail($id);
        $setting->update($dataUp);
        return redirect()->route('setting.index')->with(['success' => 'Data Berhasil Disimpan']);
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
