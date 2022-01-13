<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'cursos',
        ]);
        Category::create([
            'name' => 'tennis',
        ]);
        Category::create([
            'name' => 'celulares',
        ]);
        Category::create([
            'name' => 'computadoras',
        ]);
    }
}
