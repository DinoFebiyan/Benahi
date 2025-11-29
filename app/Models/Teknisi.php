<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'email',
        'telepon',
        'foto',
        'rating',
        'deskripsi',
    ];
}
