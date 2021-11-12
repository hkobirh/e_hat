<?php

namespace Database\Seeders;

use App\Models\Slider;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create();
        Slider::create( [
            'background_image' => $faker->imageUrl(),
            'slide_image'      => $faker->imageUrl(),
            'p_relative'       => 'Mens',
            'banner_title'     => $faker->title,
            'sale_up_to'       => 30,
        ] );
        Slider::create( [
            'background_image' => $faker->imageUrl(),
            'slide_image'      => $faker->imageUrl(),
            'p_relative'       => 'Womens',
            'banner_title'     => $faker->title,
            'sale_up_to'       => 40,
        ] );
        Slider::create( [
            'background_image' => $faker->imageUrl(),
            'slide_image'      => $faker->imageUrl(),
            'p_relative'       => 'Jens',
            'banner_title'     => $faker->title,
            'sale_up_to'       => 50,
        ] );
    }
}
