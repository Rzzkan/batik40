<?php

namespace App\Http\Controllers;

use App\Models\AlamatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function GuzzleHttp\Promise\all;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Alamat';
        $sub_title = 'Kelola Data Alamat!';

        $alamat = AlamatModel::where('id_user', auth()->user()->id)->get();

        return view('customer.alamat.index', compact(
            'alamat',
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
        $title = 'Alamat';
        $sub_title = 'Tambah Data Alamat!';

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

        return view('customer.alamat.create', compact(
            'data_prov',
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
            'penerima' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'alias' => 'required',
            'id_prov' => 'required',
            'id_kab' => 'required',
            'id_kec' => 'required',
            'nama_prov' => 'required',
            'nama_kab' => 'required',
            'nama_kec' => 'required'
        ]);

        $alamat = AlamatModel::create([
            'id_user' => auth()->user()->id,
            'penerima' => $request->penerima,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'alias' => $request->alias,
            'id_prov' => explode("---", $request->id_prov)[0],
            'id_kab' => explode("---", $request->id_kab)[0],
            'id_kec' => explode("---", $request->id_kec)[0],
            'nama_prov' => $request->nama_prov,
            'nama_kab' => $request->nama_kab,
            'nama_kec' => $request->nama_kec
        ]);

        return redirect()->route('alamat.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Alamat';
        $sub_title = 'Edit Data Alamat!';

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

        $alamat = AlamatModel::find($id);
        return view('customer.alamat.edit', compact(
            'data_prov',
            'alamat',
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
            'penerima' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'alias' => 'required',
            'id_prov' => 'required',
            'id_kab' => 'required',
            'id_kec' => 'required',
            'nama_prov' => 'required',
            'nama_kab' => 'required',
            'nama_kec' => 'required'
        ]);

        $dataUp['penerima'] = $request->penerima;
        $dataUp['no_hp'] = $request->no_hp;
        $dataUp['alamat'] = $request->alamat;
        $dataUp['alias'] = $request->alias;
        $dataUp['id_prov'] = explode("---", $request->id_prov)[0];
        $dataUp['id_kab'] = explode("---", $request->id_kab)[0];
        $dataUp['id_kec'] = explode("---", $request->id_kec)[0];
        $dataUp['nama_prov'] = $request->nama_prov;
        $dataUp['nama_kab'] = $request->nama_kab;
        $dataUp['nama_kec'] = $request->nama_kec;

        $alamat = AlamatModel::findOrFail($id);
        $alamat->update($dataUp);
        return redirect()->route('alamat.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alamat = AlamatModel::find($id);
        $alamat->delete();
        return redirect()->route('alamat.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
