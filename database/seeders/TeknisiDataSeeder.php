<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teknisi;

class TeknisiDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teknisi::create([
            'nama' => 'Andi Pratama',
            'kategori' => 'Elektronik',
            'email' => 'andi@benahi.com',
            'telepon' => '081234567890',
            'foto' => 'andiPratama.jpg',
            'rating' => 4.8,
            'deskripsi' => 'Teknisi elektronik berpengalaman 7 tahun.',
        ]);

        Teknisi::create([
            'nama' => 'Siti Rahma',
            'kategori' => 'Mesin',
            'email' => 'siti@benahi.com',
            'telepon' => '082233445566',
            'foto' => 'siti.jpg',
            'rating' => 4.7,
            'deskripsi' => 'Ahli mesin cuci, AC, dan mesin rumah tangga.',
        ]);

        Teknisi::create([
            'nama' => 'Budi Santoso',
            'kategori' => 'Motor',
            'email' => 'budi@benahi.com',
            'telepon' => '081112223334',
            'foto' => 'budi.jpg',
            'rating' => 4.9,
            'deskripsi' => 'Teknisi motor & injeksi profesional.',
        ]);
    }
}
