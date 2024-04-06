<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientPasswordsTableSeeder extends Seeder
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
                DB::table('client_passwords')->insert([
                    'client_id' => $clientId,
                    'data_category_id' => $categoryId,
                    'title' => 'Sample Account for Client ' . $clientId,
                    'username' => 'user' . $clientId,
                    'password' => Str::random(10), // Générer un mot de passe aléatoire
                    'note' => 'This is a sample password for client ' . $clientId . ' in category ' . $categoryId,
                ]);
            }
        }
    }
}
