<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class RajaOngkirController extends Controller
{
    public function get_prov()
    {
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

        return $data;
    }

    public function get_kab(Request $request)
    {
        $idProv = $request->input('id_prov');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=$idProv",
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

        return $data;
    }

    public function get_kec(Request $request)
    {
        $idKab = $request->input('id_kab');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=$idKab",
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

        return $data;
    }

    public function get_price(Request $request)
    {
        $idKecToko = $request->input('id_kec_toko');
        $idKecTujuan = $request->input('id_kec_tujuan');
        $berat = $request->input('berat');
        $kurir = $request->input('kurir');

        //pos, tiki, jne, pcp, esl, rpx, pandu, wahana, jnt, pahala, cahaya, sap, jet, indah, dse, slis, first, ncs, dan star

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $idKecToko . "&originType=subdistrict&destination=" . $idKecTujuan . "&destinationType=subdistrict&weight=" . $berat . "&courier=" . $kurir,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
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

        return $data;
    }

    public function get_lacak(Request $request)
    {
        $resi = $request->input('resi');
        $kurir = $request->input('kurir');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "waybill=" . $resi . "&courier=" . $kurir,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
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

        return $data;
    }
}
