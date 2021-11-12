<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'sliders', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'banner_title' )->nullable();
            $table->string( 'p_relative' )->nullable();
            $table->integer( 'sale_up_to' )->nullable();
            $table->string( 'background_image' )->nullable();
            $table->string( 'slide_image' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'sliders' );
    }
}
