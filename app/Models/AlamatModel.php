<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatModel extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $fillable = [
        'id_user', 'penerima', 'no_hp', 'alamat', 'alias', 'id_prov', 'id_kab', 'id_kec', 'nama_prov', 'nama_kab', 'nama_kec'
    ];

    protected $hidden = [];
}
