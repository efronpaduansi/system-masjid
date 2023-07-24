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
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('123456'),
                'role' => 'administrator',
            ]
        );

        User::create(
            [
            
                'name' => 'Ketua',
                'email' => 'ketua@mail.com',
                'password' => bcrypt('123456'),
                'role' => 'ketua',
            ]
        );

        User::create(
            [
                'name' => 'Bendahara',
                'email' => 'bendahara@mail.com',
                'password' => bcrypt('123456'),
                'role' => 'bendahara',
            ]
        );
    }
}
