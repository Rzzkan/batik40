<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknik extends Model
{
    use HasFactory;

    protected $table = 'teknik';

    protected $fillable = [
        'nama', 'biaya'
    ];

    protected $hidden = [];
}
