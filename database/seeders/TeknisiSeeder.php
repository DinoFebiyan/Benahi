<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'teknisiDino@benahi.com'],
            [
                'name' => 'Dino Ganteng Jadi Teknisi',
                'password' => Hash::make('1234567890'),
                'email_verified_at' => now(),
                'role' => 'teknisi',
            ]
        );
=======
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
>>>>>>> 6ceed45dd53a1cca6ff82cced30ae20946728815
    }
}
