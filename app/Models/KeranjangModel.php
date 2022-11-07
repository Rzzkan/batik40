<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = [
        'id_user', 'id_hasil_desain', 'biaya_mesin', 'id_warna', 'id_teknik', 'id_kain', 'jumlah', 'status', 'id_transaksi'
    ];

    protected $hidden = [];
}
