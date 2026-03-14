<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name'=>'Admin',
        'email'=>'admin@test.com',
        'password'=>'password',
        'role'=>'admin'
        ]);

        User::create([
        'name'=>'User',
        'email'=>'user@test.com',
        'password'=>'password',
        'role'=>'user'
        ]);
    }
}
