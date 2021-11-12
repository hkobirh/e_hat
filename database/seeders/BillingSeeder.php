<?php

namespace Database\Seeders;

use App\Models\Billing;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Billing::create([
            'firstname' => 'Humayun',
            'lastname' => 'Kobir',
            'mobile' => '01722879377',
            'address' => $faker->address,
        ]);
        foreach (range(1, 50) as $item) {
            Billing::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'mobile' => '01' . $this->random_numb() . rand(00000000, 99999999),
                'address' => $faker->address,
            ]);
        }
    }
    private function random_numb()
    {
        return array_rand([1, 3, 4, 5, 6, 7, 8, 9]);
    }
}
