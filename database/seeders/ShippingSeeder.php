<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Shipping::create([
            's_firstname' => 'Humayun',
            's_lastname' => 'Kobir',
            's_mobile' => '01722879377',
            's_address' => $faker->address,
        ]);
        foreach (range(1, 50) as $item) {
            Shipping::create([
                's_firstname' => $faker->firstName,
                's_lastname' => $faker->lastName,
                's_mobile' => '01' . $this->random_numb() . rand(00000000, 99999999),
                's_address' => $faker->address,
            ]);
        }
    }

    private function random_numb()
    {
        return array_rand([1, 3, 4, 5, 6, 7, 8, 9]);
    }
}
