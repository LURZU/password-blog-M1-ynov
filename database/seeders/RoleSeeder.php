<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Créer le rôle d'admin
        Role::create(['name' => 'admin']);

        // Créer le rôle d'utilisateur
        Role::create(['name' => 'user']);
    }
}
