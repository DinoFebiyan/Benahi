<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','teknisi_id','rating','komentar'];

    public function teknisi()
    {
        return $this->belongsTo(\App\Models\Teknisi::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
