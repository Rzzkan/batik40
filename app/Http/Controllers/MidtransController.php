<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function sudah_bayar(Request $request)
    {

        $this->validate($request, [
            'inpIdTransaksi' => 'required'
        ]);

        $dataUp['sudah_dibayar'] = 1;

        $transaksi = Transaksi::findOrFail($request->inpIdTransaksi);
        $transaksi->update($dataUp);

        return redirect()->route('transaksi.show', 'belum_dibayar')->with(['success' => 'Data Berhasil Disimpan.']);
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

        $get_data = Transaksi::where('id', $request->inpIdTransaksi)->first();

        echo $get_data;

        if ($get_data != null) {

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-0Mas5Z2kfCF4UZGEr-WXyFwR';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $get_data->id,
                    'gross_amount' => $get_data->total,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->name,
                    'last_name' => '',
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->no_hp
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return redirect('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $snapToken);
        } else {
            return redirect()->route('transaksi.index')->with(['failed' => 'Terjadi kesalahan, silakan coba lagi nanti.']);
        }
    }
}
