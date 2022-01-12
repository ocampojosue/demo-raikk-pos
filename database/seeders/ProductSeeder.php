<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'LARAVEL Y LIVEWIRE',
            'barcode' => '24324354',
            'cost' => 200,
            'price' => 350,
            'stock' => 1000,
            'alerts' => 10,
            'image' => 'curso.png',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'RUNNING NIKE',
            'barcode' => '24322354',
            'cost' => 600,
            'price' => 1500,
            'stock' => 1000,
            'alerts' => 10,
            'image' => 'tennis.png',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'IPHONE 11',
            'barcode' => '24354354',
            'cost' => 900,
            'price' => 1400,
            'stock' => 1000,
            'alerts' => 10,
            'image' => 'curso.png',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'PC GAMER',
            'barcode' => '24324351',
            'cost' => 790,
            'price' => 1350,
            'stock' => 1000,
            'alerts' => 10,
            'image' => 'curso.png',
            'category_id' => 4,
        ]);
    }
}
