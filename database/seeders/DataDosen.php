<?php
namespace Database\Seeders;

use App\Models\tb_panitia;
use Illuminate\Database\Seeder;

class DataDosen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Dosen

        tb_panitia::create([
            'nama' => 'Panitia INF',
            'prodi' => 'Manejemen Informatika'
        ]);

        tb_panitia::create([
            'nama' => 'Panitia TEK',
            'prodi' => 'Teknik Komputer'
        ]);
    }
}
