<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'              => 'Gina Amgeotop',
            'email'             => 'ginaamgeotop.sac@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),   // Cambia 'password' por la que quieras
            // 'role'           => 'admin',   ←←← ELIMINA ESTA LÍNEA
        ]);

        // Si quieres más usuarios admin, agrégalos aquí
    }
}