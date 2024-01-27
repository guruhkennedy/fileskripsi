<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Galeri::insert(
            [
                [
                    'tag' => 'g1',
                    'url' => 'g1.jpg',
                ],
                [
                    'tag' => 'g2',
                    'url' => 'g2.jpg',
                ],
                [
                    'tag' => 'g3',
                    'url' => 'g3.jpg',
                ],
                [
                    'tag' => 'g4',
                    'url' => 'g4.jpg',
                ],
                [
                    'tag' => 'g1',
                    'url' => 'g1.jpg',
                ],
                [
                    'tag' => 'g2',
                    'url' => 'g2.jpg',
                ],
                [
                    'tag' => 'g3',
                    'url' => 'g3.jpg',
                ],
                [
                    'tag' => 'g4',
                    'url' => 'g4.jpg',
                ]
            ]
        );
    }
}
