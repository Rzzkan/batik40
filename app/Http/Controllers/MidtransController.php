<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Exception;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function sudah_bayar(Request $request)
    {

        $this->validate($request, [
            'inpIdTransaksi' => 'required',
            'inpDesti' => 'required'
        ]);

        $dataUp['sudah_dibayar'] = 1;

        $transaksi = Transaksi::findOrFail($request->inpIdTransaksi);
        $transaksi->update($dataUp);

        return redirect()->route('transaksi.show', $request->inpDesti)->with(['success' => 'Data Berhasil Disimpan.']);
    }

    public function batal_pesanan(Request $request)
    {

        $this->validate($request, [
            'inpIdTransaksi' => 'required'
        ]);

        $dataUp['status_pengiriman'] = 'dibatalkan';

        $transaksi = Transaksi::findOrFail($request->inpIdTransaksi);
        $transaksi->update($dataUp);

        return redirect()->route('transaksi.show', 'dibatalkan')->with(['success' => 'Data Berhasil Disimpan.']);
    }

    public function bayar_pesanan(Request $request)
    {

        $this->validate($request, [
            'inpIdTransaksi' => 'required'
        ]);

        $get_data = Transaksi::findOrFail($request->inpIdTransaksi);

        // echo $get_data;

        if ($get_data != null) {

            // Set your Merchant Server Key
            // Sandbox Sebaya
            // \Midtrans\Config::$serverKey = 'SB-Mid-server-0Mas5Z2kfCF4UZGEr-WXyFwR';
            // Sandbox Batik
            \Midtrans\Config::$serverKey = 'SB-Mid-server-xIsCNi3FO6imCqwDeBhUGL5I';
            // Real Sebaya
            // \Midtrans\Config::$serverKey = 'Mid-server-4AXJ0mFunVIVH1GbGUTUTgx6';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $bayar_mid = $get_data->total + $get_data->ro_cost;
            $id_dp = "";

            if ($request->inpBayarDp == 1) {
                $bayar_mid = ($get_data->total + $get_data->ro_cost) / 2;
                if ($get_data->bayar_dp != null) {
                    $id_dp = "2";
                }
            }

            $params = array(
                'transaction_details' => array(
                    'order_id' => $get_data->id . '_' . $id_dp,
                    'gross_amount' => $bayar_mid,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->name,
                    'last_name' => '',
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->no_hp
                ),
            );

            try {
                // if ($get_data->bayar_dp == null) {
                //     $dataUp['bayar_dp'] = $bayar_mid;
                //     $get_data->update($dataUp);
                // } else {
                $dataUp['bayar_dp'] = $bayar_mid + $get_data->bayar_dp;
                $get_data->update($dataUp);
                // }

                $snapToken = \Midtrans\Snap::getSnapToken($params);
                // return redirect('https://app.midtrans.com/snap/v2/vtweb/' . $snapToken);
                return redirect('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $snapToken);
            }

            //catch exception
            catch (Exception $e) {
                return redirect()->route('transaksi.show', 'belum_dibayar')->with(['failed' => 'Terjadi kesalahan, silakan coba lagi nanti atau hubungi admin! Jika anda sudah membayar, segera tekan tombol Konfirmasi Pembayaran agar pembayaran anda segera diproses!']);
            }
        } else {
            return redirect()->route('transaksi.index')->with(['failed' => 'Terjadi kesalahan, silakan coba lagi nanti.']);
        }
    }
}
