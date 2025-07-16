<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('test@example.com'),
        ]);

        DB::table('kategori')->insert([
            'nama_kategori' => 'SK Mengajar'
        ]);
        
        DB::table('periode')->insert([
            'jenis_periode' => 'Genap 2024/2025'
        ]);

        DB::table('berita')->insert([
            'no_surat' => '492/SK-YUDISIUM/STTII-Y/VI/2025',
            'tanggal_surat' => '2025-06-17',
            'perihal' => 'SK Yudisium Magister Teologi Genap 2024/2025',
            'penerima' => 'Program Studi S2',
            'file' => 'SK YUDISIUM GENAP 2024-2025.pdf',
            'id_kategori' => 1,
            'id_periode' => 1
        ]);

        DB::table('dosen')->insert([
            'nama' => 'Farel Yosua Sualang',
            'nidn' => '2323039201',
        ]);
    }
}
