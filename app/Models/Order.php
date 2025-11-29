<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','teknisi_id','nama_pemesan','alamat','nama_barang','detail_kerusakan','metode_pembayaran','status','total_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function teknisi()
    {
        return $this->belongsTo(\App\Models\Teknisi::class);
    }
}
