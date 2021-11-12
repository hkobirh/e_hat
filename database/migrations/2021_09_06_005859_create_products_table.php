<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('model')->nullable();
            $table->decimal('price');
            $table->decimal('off_price')->nullable();
            $table->date('off_date_start')->nullable();
            $table->date('off_date_end')->nullable();
            $table->string('thumbnail');
            $table->text('gallery');
            $table->integer('quantity');
            $table->string('sku_code');
            $table->tinyInteger('featured')->default(0)->comment('1 Yes and 0 no');
            $table->string('size')->default('[]');
            $table->string('color')->default('[]');
            $table->tinyInteger('warranty')->default(0)->comment('1 Yes and 0 no');
            $table->string('warrenty_duration')->nullable();
            $table->longText('warrenty_conditions')->nullable();
            $table->longText('description')->nullable();
            $table->text('video')->nullable();
            $table->unsignedBigInteger('create_by');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
