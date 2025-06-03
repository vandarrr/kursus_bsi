<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jadwal::create([
            'kursus' => 'cybersecurity',
            'hari' => 'Selasa',
            'tanggal' => date('Y/m/d',strtotime('2025-07-01')),
            'waktu' => '08:30 - 11:00',
            'tempat' => 'Depok Creative Hub',
            'instruktur' => 'Rizky'
        ]);
        Jadwal::create([
            'kursus' => 'cybersecurity',
            'hari' => 'Kamis',
            'tanggal' => date('Y/m/d',strtotime('2025-07-10')),
            'waktu' => '13:30 - 15:00',
            'tempat' => 'Depok Creative Hub',
            'instruktur' => 'Ainindia'
        ]);
        Jadwal::create([
            'kursus' => 'cybersecurity',
            'hari' => 'Sabtu',
            'tanggal' => date('Y/m/d',strtotime('2025-07-12')),
            'waktu' => '12:30 - 14:30',
            'tempat' => 'Depok Creative Hub',
            'instruktur' => 'Gabriel'
        ]);
        Jadwal::create([
            'kursus' => 'cybersecurity',
            'hari' => 'Jumat',
            'tanggal' => date('Y/m/d',strtotime('2025-07-18')),
            'waktu' => '09:00 - 12:00',
            'tempat' => 'Depok Creative Hub',
            'instruktur' => 'Septiana'
        ]);

        // Jadwal 
        Jadwal::create([
            'kursus' => 'uiux',
            'hari' => 'Selasa',
            'tanggal' => date('Y/m/d',strtotime('2025-07-22')),
            'waktu' => '08:30 - 11:00',
            'tempat' => 'Depok Creative Hub',
            'instruktur' => 'Fajar'
        ]);
        Jadwal::create([
            'kursus' => 'uiux',
            'hari' => 'Kamis',
            'tanggal' => date('Y/m/d',strtotime('2025-07-24')),
            'waktu' => '13:30 - 15:00',
            'tempat' => 'Depok Creative Hub',
            'instruktur' => 'Ainindia'
        ]);
        Jadwal::create([
            'kursus' => 'uiux',
            'hari' => 'Sabtu',
            'tanggal' => date('Y/m/d',strtotime('2025-07-26')),
            'waktu' => '12:30 - 14:30',
            'tempat' => 'Depok Creative Hub',
            'instruktur' => 'Rizky'
        ]);
        Jadwal::create([
            'kursus' => 'uiux',
            'hari' => 'Senin',
            'tanggal' => date('Y/m/d',strtotime('2025-08-04')),
            'waktu' => '09:00 - 12:00',
            'tempat' => 'Depok Creative Hub',
            'instruktur' => 'Septiana'
        ]);
    }
}
