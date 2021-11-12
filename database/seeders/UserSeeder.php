<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create( [
            'name'       => 'Humayun',
            'email'      => 'admin@gmail.com',
            'password'   => Hash::make( '11223344' ),
            'mobile'     => '01722879377',
            'photo'      => 'logo.png',
            'status'     => 'active',
            'permission' => json_encode( ['*'] ),
        ] );

        $faker = Factory::create();
        foreach ( range( 1, 25 ) as $index ) {
            User::create( [
                'name'       => $faker->name,
                'email'      => $faker->email,
                'password'   => Hash::make( '11112222' ),
                'mobile'     => '01929323303',
                'photo'      => 'logo.png',
                'status'     => random_status( 'status' ),
                'permission' => json_encode( [1, 2] ),
            ] );

        }
    }
}
