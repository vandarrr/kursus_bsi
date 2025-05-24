<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::create([
            'konten' => "Kami dengan bangga mengumumkan penambahan modul baru dalam Kursus Programmer yang akan dimulai bulan depan. Modul ini mencakup materi terbaru seperti pengembangan web dengan React dan Node.js, aplikasi mobile dengan Kotlin dan Swift, serta dasar-dasar cloud computing.
                            Jangan lewatkan webinar akhir bulan bersama instruktur kami yang akan mendemonstrasikan teknologi terbaru dan menjawab pertanyaan peserta.
                                Segera daftar melalui dashboard atau hubungi admin untuk info lebih lanjut!"
        ]);
    }
}
