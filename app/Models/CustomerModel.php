<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    
    protected $table = 'customers';

    protected $fillable = [
        'id', 'nama', 'no_telp', 'email', 'pekerjaan', 'daerah', 'username', 'password', 'jenis', 'role'
    ];

    protected $hidden = [];
}
