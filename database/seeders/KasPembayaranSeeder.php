<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\KasMingguan;
use App\Models\KasPembayaran;

class KasPembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $siswa = Siswa::all();
        $kasMingguan = KasMingguan::all();

        foreach ($kasMingguan as $kas) {
            foreach ($siswa as $s) {
                KasPembayaran::factory()->create([
                    'siswa_id' => $s->id,
                    'kelas_id' => $s->kelas_id, // diasumsikan siswa punya kelas_id
                    'kas_mingguan_id' => $kas->id,
                ]);
            }
        }
    }
}
