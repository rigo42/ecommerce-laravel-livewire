<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
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
        

        Product::factory()
                ->count(20)
                ->hasImage()
                ->create()
                ->each(function($product){

                    $gender = Gender::inRandomOrder()->take(1)->first();
                    $brand = Brand::inRandomOrder()->take(1)->first();
                    $categories = Category::inRandomOrder()->take(3)->get();

                    $categoryArray = [];

                    foreach($categories as $category){
                        array_push($categoryArray, $category->id);
                    }

                    $product->gender_id = $gender->id;
                    $product->brand_id = $brand->id;
                    $product->update();

                    $product->categories()->attach($categoryArray);

                });
    }
}
