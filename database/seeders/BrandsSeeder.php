<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BrandsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Brands::create( [
            'user_id' => 1,
            'name'    => 'No Brand',
            'slug'    => 'no-brand',
            'icon'    => 'logo.png',
            'status'  => 'active',
        ] );
        $brands = json_decode( File::get( storage_path( 'my-data/brand.json' ) ), true );

        foreach ( $brands as $key => $value ) {
            Brands::create( $value );

        }
    }
}
