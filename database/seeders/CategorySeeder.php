<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Factory::create ();
        $categories = json_decode( File::get( storage_path( 'my-data/category.json' ) ), true );

        foreach ( $categories as $key => $value ) {
            $value['banner'] = $faker->imageUrl;
            Category::create( $value );

        }
    }
}
