<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotifModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_motif';

    protected $fillable = [
        'motif_nama', 'motif_file'
    ];

    protected $hidden = [];
}
