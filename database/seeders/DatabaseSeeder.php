<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User (untuk teknisi/administrator)
        $admin = User::create([
            'name' => 'Admin WICIDA',
            'email' => 'admin@lab-wicida.ac.id',
            'password' => bcrypt('admin123'),
            'nip' => '999999999999999999',
            'role' => 'admin',
        ]);

        // Create 3 dosens
        $dosen1 = User::create([
            'name' => 'Dr. Budi Santoso',
            'email' => 'budi@lab-wicida.ac.id',
            'password' => bcrypt('password'),
            'nip' => '198501151990031001',
            'role' => 'kepala_lab',
        ]);

        $dosen2 = User::create([
            'name' => 'Ir. Siti Nurhayati',
            'email' => 'siti@lab-wicida.ac.id',
            'password' => bcrypt('password'),
            'nip' => '198703202015032004',
            'role' => 'staf',
        ]);

        $dosen3 = User::create([
            'name' => 'Andriana Kusuma',
            'email' => 'andriana@lab-wicida.ac.id',
            'password' => bcrypt('password'),
            'nip' => '199005152018032002',
            'role' => 'staf',
        ]);

        // Create jadwals for dosen 1
        Jadwal::create([
            'user_id' => $dosen1->id,
            'hari' => 'Senin',
            'jam_mulai' => '08:00',
            'jam_selesai' => '10:00',
            'ruangan' => 'Lab WICIDA A',
            'kegiatan' => 'Mengajar',
            'keterangan' => 'Pemrograman Web',
        ]);

        Jadwal::create([
            'user_id' => $dosen1->id,
            'hari' => 'Senin',
            'jam_mulai' => '10:00',
            'jam_selesai' => '12:00',
            'ruangan' => 'Lab WICIDA A',
            'kegiatan' => 'Konsultasi',
            'keterangan' => 'Jam konsultasi terbuka',
        ]);

        Jadwal::create([
            'user_id' => $dosen1->id,
            'hari' => 'Rabu',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:00',
            'ruangan' => 'Lab WICIDA A',
            'kegiatan' => 'Mengajar',
            'keterangan' => 'Database Management',
        ]);

        Jadwal::create([
            'user_id' => $dosen1->id,
            'hari' => 'Jumat',
            'jam_mulai' => '09:00',
            'jam_selesai' => '11:00',
            'ruangan' => 'Ruang Rapat',
            'kegiatan' => 'Rapat',
            'keterangan' => 'Rapat tim lab',
        ]);

        // Create jadwals for dosen 2
        Jadwal::create([
            'user_id' => $dosen2->id,
            'hari' => 'Selasa',
            'jam_mulai' => '08:00',
            'jam_selesai' => '10:00',
            'ruangan' => 'Lab WICIDA B',
            'kegiatan' => 'Mengajar',
            'keterangan' => 'Sistem Informasi',
        ]);

        Jadwal::create([
            'user_id' => $dosen2->id,
            'hari' => 'Selasa',
            'jam_mulai' => '10:00',
            'jam_selesai' => '12:00',
            'ruangan' => 'Lab WICIDA B',
            'kegiatan' => 'Konsultasi',
            'keterangan' => 'Jam konsultasi terbuka',
        ]);

        Jadwal::create([
            'user_id' => $dosen2->id,
            'hari' => 'Kamis',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:00',
            'ruangan' => 'Lab WICIDA B',
            'kegiatan' => 'Mengajar',
            'keterangan' => 'Network Security',
        ]);

        // Create jadwals for dosen 3
        Jadwal::create([
            'user_id' => $dosen3->id,
            'hari' => 'Senin',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:00',
            'ruangan' => 'Lab WICIDA C',
            'kegiatan' => 'Mengajar',
            'keterangan' => 'Mobile Development',
        ]);

        Jadwal::create([
            'user_id' => $dosen3->id,
            'hari' => 'Rabu',
            'jam_mulai' => '08:00',
            'jam_selesai' => '10:00',
            'ruangan' => 'Lab WICIDA C',
            'kegiatan' => 'Konsultasi',
            'keterangan' => 'Jam konsultasi terbuka',
        ]);

        Jadwal::create([
            'user_id' => $dosen3->id,
            'hari' => 'Jumat',
            'jam_mulai' => '10:00',
            'jam_selesai' => '12:00',
            'ruangan' => 'Lab WICIDA C',
            'kegiatan' => 'Mengajar',
            'keterangan' => 'Cloud Computing',
        ]);

        // Create status for each dosen
        Status::create([
            'user_id' => $dosen1->id,
            'status' => 'Ada',
            'updated_at_iot' => now(),
        ]);

        Status::create([
            'user_id' => $dosen2->id,
            'status' => 'Mengajar',
            'updated_at_iot' => now(),
        ]);

        Status::create([
            'user_id' => $dosen3->id,
            'status' => 'Konsultasi',
            'updated_at_iot' => now(),
        ]);
    }
}

