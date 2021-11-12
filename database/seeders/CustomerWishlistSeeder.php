<?php

namespace Database\Seeders;

use App\Models\Customer_wishlist;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class CustomerWishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,5) as $item){
            Customer_wishlist::create([
                'user_id'=> rand(1,5),
                'product_id'=> json_encode([1,2,3,4]),
            ]);
        }
    }
}
