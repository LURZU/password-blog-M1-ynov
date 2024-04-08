<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_clients')->insert([
            'data_category_id' => 1, // assuming the user_id from UsersTableSeeder
            'name' => 'Client 1',
            'email' => 'client1@example.com',
            'phone' => '1234567890',
            'address' => '123 Main St',
        ]);
    }
}
