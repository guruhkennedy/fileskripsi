<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::insert([
            'name' => 'Sewa Gedung Guruh',
            'address' => 'Jl. Raya Kedungwuni No. 1, Kedungwuni, Kec. Kedungwuni, Kota Bandung, Jawa Barat 40257',
            'phone' => '+6281212121212',
            'email' => 'samplemail@gmail.com',
            'facebook' => 'https://www.facebook.com/traveloki',
            'twitter' => 'https://www.twitter.com/traveloki',
            'instagram' => 'https://www.instagram.com/traveloki',
            'whatsapp' => 'https://wa.me/6281212121212',
            'description' => 'Traveloki adalah sebuah website yang menyediakan informasi mengenai destinasi wisata di Indonesia.',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'about' => 'Traveloki adalah sebuah website yang menyediakan informasi mengenai destinasi wisata di Indonesia.',
            'sk' => 'Lorem ipsum dolor sit amet',
            'created_at' => now(),
        ]);
    }
}
