<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotifKarakterModel extends Model
{
    use HasFactory;

    protected $table = 'jtbl_motif_karakter';

    protected $fillable = [
        'motif_id', 'karakter_id'
    ];

    protected $hidden = [];
}
