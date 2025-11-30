<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teknisi;

class TeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teknisis = [
            // Teknisi Elektronik
            [
                'nama' => 'Andi Pratama',
                'email' => 'andi.pratama@benahi.com',
                'kategori' => 'Elektronik',
                'keahlian' => 'Laptop, Printer, Monitor, Smartphone',
                'cv' => 'Teknisi elektronik berpengalaman lebih dari 5 tahun. Spesialis perbaikan laptop, printer, dan perangkat elektronik lainnya.',
                'foto' => null,
                'rating' => 4.8,
                'jumlah_rating' => 45,
                'pengalaman_tahun' => 5,
                'telepon' => '081234567890',
                'deskripsi' => 'Teknisi elektronik profesional dengan pengalaman luas dalam memperbaiki berbagai perangkat elektronik rumah tangga dan kantor.',
            ],
            [
                'nama' => 'Rizki Maulana',
                'email' => 'rizki.maulana@benahi.com',
                'kategori' => 'Elektronik',
                'keahlian' => 'TV, AC, Kulkas, Mesin Cuci',
                'cv' => 'Ahli perbaikan perangkat elektronik rumah tangga dengan sertifikasi resmi dari berbagai brand ternama.',
                'foto' => null,
                'rating' => 4.7,
                'jumlah_rating' => 38,
                'pengalaman_tahun' => 6,
                'telepon' => '081234567891',
                'deskripsi' => 'Spesialis perbaikan AC, kulkas, dan mesin cuci dengan teknik yang teruji dan terpercaya.',
            ],
            [
                'nama' => 'Dewi Sari',
                'email' => 'dewi.sari@benahi.com',
                'kategori' => 'Elektronik',
                'keahlian' => 'Smartphone, Tablet, Laptop',
                'cv' => 'Teknisi handphone dan laptop berpengalaman. Menguasai berbagai merek dan model terbaru.',
                'foto' => null,
                'rating' => 4.9,
                'jumlah_rating' => 52,
                'pengalaman_tahun' => 4,
                'telepon' => '081234567892',
                'deskripsi' => 'Spesialis perbaikan smartphone dan laptop dengan layanan cepat dan berkualitas.',
            ],

            // Teknisi Motor
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@benahi.com',
                'kategori' => 'Motor',
                'keahlian' => 'Servis Motor, Kelistrikan, Mesin',
                'cv' => 'Mekanik motor profesional dengan pengalaman lebih dari 7 tahun. Spesialis motor matic dan manual.',
                'foto' => null,
                'rating' => 4.8,
                'jumlah_rating' => 67,
                'pengalaman_tahun' => 7,
                'telepon' => '081234567893',
                'deskripsi' => 'Mekanik motor berpengalaman dengan layanan servis lengkap mulai dari tune up hingga perbaikan mesin.',
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@benahi.com',
                'kategori' => 'Motor',
                'keahlian' => 'Motor Injeksi, Karburator, Rem',
                'cv' => 'Ahli perbaikan motor injeksi dan karburator. Menguasai berbagai merek motor Honda, Yamaha, Suzuki.',
                'foto' => null,
                'rating' => 4.6,
                'jumlah_rating' => 43,
                'pengalaman_tahun' => 5,
                'telepon' => '081234567894',
                'deskripsi' => 'Spesialis motor injeksi dengan layanan perbaikan yang cepat dan akurat.',
            ],
            [
                'nama' => 'Eko Prasetyo',
                'email' => 'eko.prasetyo@benahi.com',
                'kategori' => 'Motor',
                'keahlian' => 'Ganti Oli, Tune Up, Perbaikan Transmisi',
                'cv' => 'Mekanik motor dengan fokus pada perawatan rutin dan perbaikan transmisi motor.',
                'foto' => null,
                'rating' => 4.5,
                'jumlah_rating' => 35,
                'pengalaman_tahun' => 4,
                'telepon' => '081234567895',
                'deskripsi' => 'Layanan servis motor lengkap dengan harga terjangkau dan kualitas terjamin.',
            ],

            // Teknisi Mesin
            [
                'nama' => 'Sandi Putra',
                'email' => 'sandi.putra@benahi.com',
                'kategori' => 'Mesin',
                'keahlian' => 'Mesin Cuci, Kompresor, Pompa Air',
                'cv' => 'Teknisi mesin rumah tangga dengan pengalaman 6 tahun. Spesialis mesin cuci dan pompa air.',
                'foto' => null,
                'rating' => 4.7,
                'jumlah_rating' => 41,
                'pengalaman_tahun' => 6,
                'telepon' => '081234567896',
                'deskripsi' => 'Ahli perbaikan mesin cuci, kompresor, dan pompa air dengan layanan panggilan cepat.',
            ],
            [
                'nama' => 'Siti Rahma',
                'email' => 'siti.rahma@benahi.com',
                'kategori' => 'Mesin',
                'keahlian' => 'AC, Mesin Cuci, Kulkas',
                'cv' => 'Teknisi mesin rumah tangga profesional. Spesialis AC dan mesin cuci dengan garansi perbaikan.',
                'foto' => null,
                'rating' => 4.8,
                'jumlah_rating' => 48,
                'pengalaman_tahun' => 5,
                'telepon' => '081234567897',
                'deskripsi' => 'Layanan perbaikan AC dan mesin cuci dengan teknik modern dan suku cadang asli.',
            ],
            [
                'nama' => 'Joko Widodo',
                'email' => 'joko.widodo@benahi.com',
                'kategori' => 'Mesin',
                'keahlian' => 'Genset, Kompresor, Mesin Industri',
                'cv' => 'Teknisi mesin industri dan genset dengan sertifikasi resmi. Melayani perbaikan mesin berat.',
                'foto' => null,
                'rating' => 4.6,
                'jumlah_rating' => 29,
                'pengalaman_tahun' => 8,
                'telepon' => '081234567898',
                'deskripsi' => 'Spesialis perbaikan genset dan mesin industri dengan pengalaman luas di bidangnya.',
            ],
            [
                'nama' => 'Maya Indira',
                'email' => 'maya.indira@benahi.com',
                'kategori' => 'Mesin',
                'keahlian' => 'Mesin Cuci, Kulkas, Dispenser',
                'cv' => 'Teknisi mesin rumah tangga dengan fokus pada perbaikan mesin cuci dan kulkas berbagai merek.',
                'foto' => null,
                'rating' => 4.7,
                'jumlah_rating' => 36,
                'pengalaman_tahun' => 4,
                'telepon' => '081234567899',
                'deskripsi' => 'Layanan perbaikan mesin cuci dan kulkas dengan harga kompetitif dan garansi perbaikan.',
            ],
        ];

        foreach ($teknisis as $teknisi) {
            Teknisi::create($teknisi);
        }
    }
}
