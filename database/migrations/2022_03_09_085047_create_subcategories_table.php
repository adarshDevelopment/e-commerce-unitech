<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
}
