<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rekening::insert(
            [
                [
                    'id_bank' => 4,
                    'no_rekening' => '005701063854502',
                    'atas_nama' => 'Guruh Kontol',
                    'cabang' => 'Bogor',
                    'status' => 'Aktif',
                    'created_at' => now(),
                ]
            ]
        );
    }
}
