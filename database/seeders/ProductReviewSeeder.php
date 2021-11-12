<?php

namespace Database\Seeders;

use App\Models\ProductReview;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,2000) as $item){
            ProductReview::create([
                'customer_id'=> rand(1,50),
                'product_id'=>rand(1,2000),
                'rating'=>rand(1,5),
                'message'=>$faker->realText,
            ]);
        }
    }
}
