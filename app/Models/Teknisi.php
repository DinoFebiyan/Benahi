<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama','email','kategori','keahlian','cv','foto','rating','jumlah_rating','pengalaman_tahun'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'teknisi_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'teknisi_id');
    }

    public function recalculateRating()
    {
        $avg = $this->ratings()->avg('rating') ?? 0;
        $count = $this->ratings()->count();
        $this->rating = round($avg, 2);
        $this->jumlah_rating = $count;
        $this->save();
    }
}
