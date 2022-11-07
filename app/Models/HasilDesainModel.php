<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDesainModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_hasilbatik';

    protected $fillable = [
        'hasilbatik_id', 'hasilbatik_file', 'hasilbatik_filehp', 'hasilbatik_tanggal', 'hasilbatik_kreator', 'hasilbatik_namakarya', 'algoritma_id', 'hasilbatik_jmlmotif', 'hasilbatik_widthCanv', 'hasilbatik_heightCanv', 'hasilbatik_paddingTop', 'hasilbatik_paddingSide', 'hasilbatik_gap', 'hasilbatik_gapX', 'hasilbatik_gapY', 'jumlahPembelian', 'teknik_pewarnaan', 'warna1', 'jumlah_warna1', 'warna2', 'jumlah_warna2', 'warna3', 'jumlah_warna3', 'warnaBg', 'jumlah_warnabg', 'durasi', 'manufacturing_duration', 'manufacturing_date', 'harga', 'status', 'status_bayar', 'id_customer', 'delivery_time', 'last_id_in_process'
    ];

    protected $hidden = [];
}
