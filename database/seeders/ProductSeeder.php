<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create();
        foreach ( range( 1, 2000 ) as $item ) {
            $name = substr( $faker->unique->paragraph, 0, 45 );
            Product::create( [
                'brand_id'       => rand( 1, 10 ),
                'category_id'    => rand( 1, 50 ),
                'name'           => $name,
                'slug'           => slugify( $name ),
                'model'          => 'M -' . rand( 250, 320 ),
                'price'          => rand( 300, 400 ),
                'off_price'      => rand( 250, 299 ),
                'off_date_start' => date( 'Y-m-d' ),
                'off_date_end'   => date( 'Y-m-d' ),
                'thumbnail'      => $faker->imageUrl,
                'gallery'        => json_encode( [$faker->imageUrl, $faker->imageUrl, $faker->imageUrl] ),
                'quantity'       => 100,
                'sku_code'       => $item . date( 'Ymd' ),
                'description'    => $faker->realText( 400 ),
                'status'         => random_status(),
                'create_by'      => 1,
            ] );
        }
    }
}
