<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "Tom",
            'email' => "mostitom11@gmail.com",
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('admin');

        $user2 = User::create([
            'name' => "Jerry",
            'email' => "tommosti1@gmail.com",
            'password' => Hash::make('password'),
        ]);

        $user2->assignRole('user');
    }
}
