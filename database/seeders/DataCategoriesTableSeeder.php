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
            ['name' => 'Personal', 'description' => 'Personal information'],
            ['name' => 'Work', 'description' => 'Work-related information'],
            ['name' => 'Financial', 'description' => 'Financial information'],
        ]);
    }
}
