<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            $table->text('comment');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_comments');
    }
}
