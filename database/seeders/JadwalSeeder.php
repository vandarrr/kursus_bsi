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
            'hari' => 'Senin',
            'tanggal' => date('Y/m/d',strtotime('2024-07-08')),
            'waktu' => '08:30 - 11:00',
            'tempat' => 'Bandung Creative Hub',
            'instruktur' => 'Jason Lee Scott'
        ]);
        Jadwal::create([
            'kursus' => 'cybersecurity',
            'hari' => 'Rabu',
            'tanggal' => date('Y/m/d',strtotime('2024-07-10')),
            'waktu' => '13:30 - 15:00',
            'tempat' => 'Bandung Creative Hub',
            'instruktur' => 'John Doe'
        ]);
        Jadwal::create([
            'kursus' => 'cybersecurity',
            'hari' => 'Sabtu',
            'tanggal' => date('Y/m/d',strtotime('2024-07-13')),
            'waktu' => '12:30 - 14:30',
            'tempat' => 'Bandung Creative Hub',
            'instruktur' => 'Michael Dell'
        ]);
        Jadwal::create([
            'kursus' => 'cybersecurity',
            'hari' => 'Kamis',
            'tanggal' => date('Y/m/d',strtotime('2024-07-18')),
            'waktu' => '09:00 - 12:00',
            'tempat' => 'Bandung Creative Hub',
            'instruktur' => 'Bruce Wills'
        ]);

        // Jadwal 
        Jadwal::create([
            'kursus' => 'uiux',
            'hari' => 'Senin',
            'tanggal' => date('Y/m/d',strtotime('2024-07-22')),
            'waktu' => '08:30 - 11:00',
            'tempat' => 'Bandung Creative Hub',
            'instruktur' => 'Jason Lee Scott'
        ]);
        Jadwal::create([
            'kursus' => 'uiux',
            'hari' => 'Rabu',
            'tanggal' => date('Y/m/d',strtotime('2024-07-24')),
            'waktu' => '13:30 - 15:00',
            'tempat' => 'Bandung Creative Hub',
            'instruktur' => 'John Doe'
        ]);
        Jadwal::create([
            'kursus' => 'uiux',
            'hari' => 'Sabtu',
            'tanggal' => date('Y/m/d',strtotime('2024-07-27')),
            'waktu' => '12:30 - 14:30',
            'tempat' => 'Bandung Creative Hub',
            'instruktur' => 'Michael Dell'
        ]);
        Jadwal::create([
            'kursus' => 'uiux',
            'hari' => 'Kamis',
            'tanggal' => date('Y/m/d',strtotime('2024-08-03')),
            'waktu' => '09:00 - 12:00',
            'tempat' => 'Bandung Creative Hub',
            'instruktur' => 'Bruce Wills'
        ]);
    }
}
