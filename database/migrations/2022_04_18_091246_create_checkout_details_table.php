<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checkout_id');
            $table->unsignedBigInteger('product_id');
            $table->double('price',15,8);
            $table->integer('quantity');
            $table->double('discount',15,8)->nullable();
            $table->double('discounted_price',15,8);
            $table->double('tax',15,8);
            $table->double('subtotal',15,8);
            $table->double('total',15,8);
            $table->timestamps();
            $table->foreign('checkout_id')->references('id')->on('checkouts');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout_details');
    }
}
