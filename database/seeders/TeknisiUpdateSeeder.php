<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TeknisiUpdateSeeder extends Seeder
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
    }
}