<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Customer::create([
            'name' => 'Kobir',
            'email_verified' => "1",
            'mobile' => '01722879377',
            'email' => 'hkobirh@gmail.com',
            'password' => Hash::make('123123'),
        ]);
        foreach(range(1,500) as $item){
            Customer::create([
                'name' => $faker->lastName,
                'email_verified' => "1",
                'mobile' => '01' . $this->random_numb() . rand(00000000, 99999999),
                'email' => $faker->email,
                'password' => Hash::make('123456'),
            ]);
        }

    }

    private function random_numb()
    {
        return array_rand([1, 3, 4, 5, 6, 7, 8, 9]);
    }
}
