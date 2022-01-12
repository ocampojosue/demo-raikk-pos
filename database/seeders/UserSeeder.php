<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Josue Ocampo',
            'phone' => '67690586',
            'email' => 'admin@admin.com',
            'profile' =>'ADMINISTRADOR',
            'status' => 'Active',
            'password' => bcrypt('admin')
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Alex OCampo',
            'phone' => '12345678',
            'email' => 'cajero@cajero.com',
            'profile' =>'CAJERO',
            'status' => 'Active',
            'password' => bcrypt('cajero')
        ])->assignRole('Cajero');
        User::create([
            'name' => 'Alex OCampo',
            'phone' => '12345678',
            'email' => 'supervisor@supervisor.com',
            'profile' => 'SUPERVISOR',
            'status' => 'Active',
            'password' => bcrypt('supervisor')
        ])->assignRole('Supervisor');
    }
}
