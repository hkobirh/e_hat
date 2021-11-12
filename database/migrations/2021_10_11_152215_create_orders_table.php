<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger ('customer_id');
            $table->unsignedBigInteger ('shipping_id');
            $table->BigInteger ('billing_id');
            $table->double ('amount');
            $table->longText('order-notes')->nullable();
            $table->enum ('pay_method',[1,2])->default('2');
            $table->enum ('shipping_type',[1,2,3])->default('3');
            $table->enum ('order_status',['pending','shipped','return','success'])->default('pending');
            $table->timestamps();

            $table->foreign('customer_id')->references ('id')->on('customers')->onDelete ('cascade');
            //$table->foreign ('billing_id')->references ('id')->on('billings')->onDelete ('cascade');
            $table->foreign ('shipping_id')->references ('id')->on('shippings')->onDelete ('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
