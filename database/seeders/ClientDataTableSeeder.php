<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assurez-vous que les IDs correspondent à ceux existants dans vos tables
        $clientIds = DB::table('data_clients')->pluck('id');
        $categoryIds = DB::table('data_categories')->pluck('id');

        foreach ($clientIds as $clientId) {
            foreach ($categoryIds as $categoryId) {
                DB::table('client_data')->insert([
                    'client_id' => $clientId,
                    'data_category_id' => $categoryId,
                    'type' => 'Note',
                    'value' => 'This is a sample note for client ' . $clientId . ' in category ' . $categoryId,
                ]);
            }
        }
    }
}
