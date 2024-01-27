<?php

namespace Database\Seeders;

use App\Models\Gedung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gedung::insert(
            [
                [
                    'nama' => 'Gedung A',
                    'deskripsi' => 'Gedung A',
                    'foto' => 'gedung-a.jpg',
                    'harga' => '50000',
                    'status' => 1,
                ],
                [
                    'nama' => 'Gedung B',
                    'deskripsi' => 'Gedung B',
                    'foto' => 'gedung-b.jpg',
                    'harga' => '150000',
                    'status' => 1,
                ]
            ]
        );
    }
}
