<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TeknisiUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $teknisis = [
            ['name' => 'Andi Pratama', 'email' => 'andi.pratama@benahi.com'],
            ['name' => 'Rizki Maulana', 'email' => 'rizki.maulana@benahi.com'],
            ['name' => 'Dewi Sari', 'email' => 'dewi.sari@benahi.com'],
            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@benahi.com'],
            ['name' => 'Ahmad Fauzi', 'email' => 'ahmad.fauzi@benahi.com'],
            ['name' => 'Eko Prasetyo', 'email' => 'eko.prasetyo@benahi.com'],
            ['name' => 'Sandi Putra', 'email' => 'sandi.putra@benahi.com'],
            ['name' => 'Siti Rahma', 'email' => 'siti.rahma@benahi.com'],
            ['name' => 'Joko Widodo', 'email' => 'joko.widodo@benahi.com'],
            ['name' => 'Maya Indira', 'email' => 'maya.indira@benahi.com'],
        ];

        foreach ($teknisis as $teknisi) {
            DB::table('users')->insert([
                'name' => $teknisi['name'],
                'email' => $teknisi['email'],
                'email_verified_at' => $now,
                'password' => Hash::make('1234567890'),
                'created_at' => $now,
                'updated_at' => $now,
                'role' => 'teknisi',
            ]);
        }
    }
}
