<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::insert(
            [
                [
                    'nama' => 'Mandiri',
                    'logo' => 'mandiri.png',
                    'created_at' => now(),
                ],
                [
                    'nama' => 'BCA',
                    'logo' => 'bca.png',
                    'created_at' => now(),
                ],
                [
                    'nama' => 'BNI',
                    'logo' => 'bni.png',
                    'created_at' => now(),
                ],
                [
                    'nama' => 'BRI',
                    'logo' => 'bri.png',
                    'created_at' => now(),
                ]
            ]
        );
    }
}
