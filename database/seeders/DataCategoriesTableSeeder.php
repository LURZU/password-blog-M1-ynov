<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_categories')->insert([
            ['name' => 'Personal', 'description' => 'Personal information', 'user_id' => 1],
            ['name' => 'Health', 'description' => 'Health-related information', 'user_id' => 1],
            ['name' => 'Work', 'description' => 'Work-related information', 'user_id' => 2],
        ]);
    }
}
