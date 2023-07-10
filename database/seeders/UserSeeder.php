<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'id' => 1,
            'nombre_usuario' => 'miller',
            'apellido_usuario' => 'rivera',
            'identificacion' => '1007750963',
            'email' => 'miller@gmail.com',
            'password' => bcrypt('millerpass'),
            'rol' => 1
        ]);
    }
}
