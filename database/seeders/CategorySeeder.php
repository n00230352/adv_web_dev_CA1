<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['category_name' => 'Tops', 'description' => 'Clothing items worn on the upper part of the body.'],
            ['category_name' => 'Bottoms', 'description' => 'Clothing worn on the lower part of the body.'],
            ['category_name' => 'Dresses', 'description' => 'One-piece garments for both casual and formal occasions.'],
            ['category_name' => 'Activewear', 'description' => 'Clothing designed for physical activity and comfort.'],
            ['category_name' => 'Footwear', 'description' => 'Items worn on the feet for protection, comfort, or style.'],
        ]);
    }
}
