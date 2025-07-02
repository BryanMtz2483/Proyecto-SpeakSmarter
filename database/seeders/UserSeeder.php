<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
//  NUNCA HAY QUE OLVIDAR LAS IMPORTACIONES DE LO QUE OCUPAREMOS
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeder para crear por defecto un admin y un editor para asignarles sus respectivos roles y permisos 
        $admin = User::create([
            'name' => 'admin',
            'email'=> 'admin@speaksmarter.net',
            'password' => Hash::make('admin')
        ]);
        $admin->assignRole('admin');
        
        $editor = User::create([
            'name' => 'editor',
            'email'=> 'editor@speaksmarter.net',
            'password' => Hash::make('editor')
        ]);
        $editor->assignRole('editor');
    }
}
