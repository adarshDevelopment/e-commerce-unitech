<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->text('address');
            //column for total cost before tax
            $table->double('subtotal',15,8);
            //column for total discount
            $table->double('discount',15,8);
            $table->double('tax',15,8);
            $table->double('total',15,8);
            $table->string('payment_type');
            $table->string('payment_code')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('checkouts');
    }
}
