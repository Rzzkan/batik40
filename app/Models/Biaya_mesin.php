<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya_mesin extends Model
{
    use HasFactory;

    protected $table = 'biaya_mesin';

    protected $fillable = [
        'member', 'non_member'
    ];

    protected $hidden = [];
}
