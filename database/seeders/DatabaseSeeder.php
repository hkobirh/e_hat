<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductReview;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call( [
            UserSeeder::class,
            BrandsSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            SliderSeeder::class,
            CustomerSeeder::class,
            ShippingSeeder::class,
            BillingSeeder::class,
            CustomerWishlistSeeder::class,
            ProductReviewSeeder::class
        ] );
    }
}
