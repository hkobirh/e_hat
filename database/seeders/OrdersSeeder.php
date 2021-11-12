<?php

namespace Database\Seeders;

use App\Models\Frontend\Orders;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,50) as $item){
            Orders::create([
              'customer_id'=>rand(1,50),
              'shipping_id'=>rand(1,50),
              'billing_id'=>rand(1,50),
              'amount'=>rand(99,499),
              'order_status'=>rand("'pending','shipped','return','success'"),
            ]);
        }
    }
}
