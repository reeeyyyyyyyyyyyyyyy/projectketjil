<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin DPMPTSP',
            'email' => 'admin@dpmptsp.jatim.go.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '03112345678'
        ]);

        User::create([
            'name' => 'Pegawai Contoh',
            'email' => 'staff@dpmptsp.jatim.go.id',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '081234567890'
        ]);

        User::create([
            'name' => 'Pelanggan Contoh',
            'email' => 'guest@example.com',
            'password' => Hash::make('password'),
            'role' => 'guest',
            'phone' => '087654321098'
        ]);
    }
}
