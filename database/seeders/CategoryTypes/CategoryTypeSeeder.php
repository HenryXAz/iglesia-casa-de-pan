<?php

namespace Database\Seeders\CategoryTypes;

use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = new CategoryType();
        $posts->description = 'publicaciones';
        $posts->save();

        $foodProducts = new CategoryType();
        $foodProducts->description = 'venta de alimentos';
        $foodProducts->save();

        // food product general category
        $generalFoods = new Category();
        $generalFoods->description = 'general';
        $generalFoods->category_type_id = $foodProducts->id;
        $generalFoods->save();

    }
}
