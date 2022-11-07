<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'total', 'id_proses', 'status', 'id_alamat', 'berat', 'resi', 'ro_code', 'ro_name', 'ro_service', 'ro_description', 'ro_cost', 'ro_etd', 'poin_bintang', 'komentar', 'status_pengiriman', 'sudah_dibayar'
    ];

    protected $hidden = [];

    public function produks()
    {
        return $this->hasMany(KeranjangModel::class, 'id_transaksi', 'id')
            ->select('keranjang.*', 'tbl_hasilbatik.hasilbatik_file as file_batik', 'tbl_hasilbatik.hasilbatik_namakarya as nama_batik', 'warna.nama as nama_warna', 'warna.biaya as biaya_warna', 'teknik.nama as nama_teknik', 'teknik.biaya as biaya_teknik', 'kain.nama as nama_kain', 'kain.biaya as biaya_kain', 'kain.berat as berat_kain')
            ->leftJoin('tbl_hasilbatik', 'tbl_hasilbatik.hasilbatik_id', '=', 'keranjang.id_hasil_desain')
            ->leftJoin('warna', 'warna.id', '=', 'keranjang.id_warna')
            ->leftJoin('teknik', 'teknik.id', '=', 'keranjang.id_teknik')
            ->leftJoin('kain', 'kain.id', '=', 'keranjang.id_kain')
            ->where('id_user', auth()->user()->id);
    }

    public function log_proses()
    {
        return $this->hasMany(Log_proses::class, 'id_transaksi', 'id')
            ->select('log_proses.*', 'proses.nama as nama_proses')
            ->leftJoin('proses', 'log_proses.id_proses', '=', 'proses.id')
            ->orderBy('log_proses.id', 'DESC');
    }

    public function alamat()
    {
        return $this->hasOne(AlamatModel::class, 'id', 'id_alamat');
    }
}
