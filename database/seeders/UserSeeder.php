<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run() {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@perpus.test',
            'password' => bcrypt('admin123'),
        ]);
    }
    
}
