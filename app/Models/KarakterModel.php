<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarakterModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_karakter';

    protected $fillable = [
        'karakter_id', 'karakter_nama'
    ];

    protected $hidden = [];
}
