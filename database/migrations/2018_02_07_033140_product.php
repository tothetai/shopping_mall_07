<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_id')->unsigned();
            $table->string('name');
            $table->string('pro_slug');
            $table->tinyInteger('new');
            $table->string('description');
            $table->integer('quantity');
            $table->string('condition');
            $table->string('promotion');
            $table->tinyInteger('status');
            $table->tinyInteger('featured');
            $table->integer('price');
            $table->string('discount');
            $table->string('img');
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
