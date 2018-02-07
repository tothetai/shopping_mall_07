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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_id')->unsigned();
            $table->string('name');
            $table->tinyInteger('new');
            $table->string('pro_description');
            $table->integer('pro_quantity');
            $table->integer('pro_price');
            $table->integer('pro_discount');
            $table->text('pro_img');
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
        Schema::dropIfExists('product');
    }
}
