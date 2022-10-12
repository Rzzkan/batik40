<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name', 'no_hp', 'email', 'role', 'password'
    ];

    protected $hidden = [];
}
