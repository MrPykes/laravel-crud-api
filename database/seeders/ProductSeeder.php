<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Attribute;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Attribute::create([
            'name' => 'Color ',
            'value' => 'Red',
        ]);
        Attribute::create([
            'name' => 'Size ',
            'value' => '128',
        ]);


        Category::create([
            'name' => 'Lenovo',
            'description' => 'Lenovo Description',
        ]);
        Category::create([
            'name' => 'Lenovo',
            'description' => 'Lenovo Description',
        ]);
    }
}
