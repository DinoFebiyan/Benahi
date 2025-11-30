<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teknisi;

class TeknisiSeeder extends Seeder
{
    public function run()
    {
        Teknisi::insert([
            [
                'nama'=>'Andi Pratama','email'=>'andi@gmail.com','kategori'=>'Elektronik',
                'keahlian'=>'Laptop, Printer','cv'=>'Teknisi elektronik berpengalaman 5 tahun.',
                'rating'=>4.8,'pengalaman_tahun'=>5
            ],
            [
                'nama'=>'Sandi Putra','email'=>'sandi@gmail.com','kategori'=>'Mesin',
                'keahlian'=>'Mesin cuci, Kompresor','cv'=>'Teknisi mesin 4 tahun pengalaman.',
                'rating'=>4.7,'pengalaman_tahun'=>4
            ],
            [
                'nama'=>'Budi Santoso','email'=>'budi@gmail.com','kategori'=>'Motor',
                'keahlian'=>'Servis motor, kelistrikan','cv'=>'Mekanik motor 6 tahun.',
                'rating'=>4.6,'pengalaman_tahun'=>3
            ],
        ]);
    }
}
