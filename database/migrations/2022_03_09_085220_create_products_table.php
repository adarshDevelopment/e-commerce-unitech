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

            $table->string('title');
            $table->string('slug');
            $table->double('price');
            $table->double('discount')->nullable();
//            $table->integer('stock')->default(0);
            $table->integer('quantity')->default(0);
            $table->boolean('featured_product')->default(0);
            $table->string('short_description');
            $table->string('specification')->nullable();
            $table->text('description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade')->onUpdate('cascade');;
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
