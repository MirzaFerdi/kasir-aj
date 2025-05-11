<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Owner',
            'email' => 'owner@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
        User::create([
            'nama' => 'Kasir',
            'email' => 'kasir@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);
    }
}
