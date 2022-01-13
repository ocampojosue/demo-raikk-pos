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
            'name' => 'josue ocampo',
            'phone' => '67690586',
            'email' => 'admin@admin.com',
            'profile' => 'administrador',
            'status' => 'Active',
            'password' => bcrypt('admin')
        ])->assignRole('administrador');
        User::create([
            'name' => 'alex ocampo',
            'phone' => '12345678',
            'email' => 'cajero@cajero.com',
            'profile' => 'cajero',
            'status' => 'Active',
            'password' => bcrypt('cajero')
        ])->assignRole('cajero');
        User::create([
            'name' => 'josé ocampo',
            'phone' => '12345678',
            'email' => 'supervisor@supervisor.com',
            'profile' => 'supervisor',
            'status' => 'Active',
            'password' => bcrypt('supervisor')
        ])->assignRole('supervisor');
    }
}