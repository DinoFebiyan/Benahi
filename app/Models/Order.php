<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teknisi_id',
        'nama_pemesan',
        'alamat',
        'nama_barang',
        'detail_kerusakan',
        'metode_pembayaran',
        'status',       // pending, paid, etc
        'total_bayar',  // total harga
    ];

    /**
     * Relasi Order → User
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Relasi Order → Teknisi
     */
    public function teknisi()
    {
        return $this->belongsTo(\App\Models\Teknisi::class);
    }

    /**
     * Relasi Order → Payment
     * Satu order hanya bisa memiliki satu payment
     */
    public function payment()
    {
        return $this->hasOne(\App\Models\Payment::class);
    }
}
