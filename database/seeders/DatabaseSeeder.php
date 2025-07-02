<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Mandamos llamar a todos los seeders para cargar todas las migraciones para niveles, reoles y usuarios con roles asignados
        $this->call([
            LevelSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
    ]);
    }
}
