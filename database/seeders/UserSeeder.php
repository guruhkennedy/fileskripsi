<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => "admin",
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('password'),
            'role' => 1,
            'email_verified_at' => now(),
        ]);
        User::create([
            'username' => "guruh",
            'name' => "Guruh",
            'email' => "guruh@gmail.com",
            'password' => Hash::make('password'),
            'role' => 1,
            'email_verified_at' => now(),
        ]);
        //create for karyawan
        User::create([
            'username' => "karyawan",
            'name' => "Karyawan",
            'email' => "karyawan@gmail.com",
            'password' => Hash::make('password'),
            'role' => 0,
            'email_verified_at' => now(),
        ]);
    }
}
