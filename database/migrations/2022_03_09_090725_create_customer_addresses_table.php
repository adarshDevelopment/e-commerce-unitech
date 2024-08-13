<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('address_type');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('municipality_id');
            $table->integer('ward');
            $table->string('street');
            $table->timestamps();
            $table->foreign('address_type')->references('id')->on('address_types');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
}
