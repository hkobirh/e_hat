<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger ('order_id');
            $table->unsignedBigInteger ('product_id');
            $table->string ('product_name');
            $table->string ('product_slug');
            $table->double ('product_price');
            $table->double ('product_qty');
            $table->timestamps();

            $table->foreign ('order_id')->references ('id')->on('orders')->onDelete ('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
