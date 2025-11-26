<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@benahi.com'],
            [
                'name' => 'Admin Benahi',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'email_verified_at' => now(), // langsung verifikasi
            ]
        );
    }
}
