<?php

namespace Database\Seeders;

use App\Models\Denomination;
use Illuminate\Database\Seeder;

class DenominationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Denomination::create([
            'type' => 'billete',
            'value' => '200'
        ]);
        Denomination::create([
            'type' => 'billete',
            'value' => '100'
        ]);
        Denomination::create([
            'type' => 'billete',
            'value' => '50'
        ]);
        Denomination::create([
            'type' => 'billete',
            'value' => '20'
        ]);
        Denomination::create([
            'type' => 'billete',
            'value' => '10'
        ]);
        Denomination::create([
            'type' => 'moneda',
            'value' => '5'
        ]);
        Denomination::create([
            'type' => 'moneda',
            'value' => '2'
        ]);
        Denomination::create([
            'type' => 'moneda',
            'value' => '1'
        ]);
        Denomination::create([
            'type' => 'moneda',
            'value' => '0.5'
        ]);
        Denomination::create([
            'type' => 'otro',
            'value' => '0'
        ]);
    }
}
