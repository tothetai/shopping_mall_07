<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sub_category', function ($table) {
            $table->foreign('cat_id')->references('id')->on('categories');
        });
        Schema::table('products', function ($table) {
            $table->foreign('sub_id')->references('id')->on('sub_category');
        });
        Schema::table('bill_detail', function ($table) {
            $table->foreign('pro_id')->references('id')->on('products');
        });
         Schema::table('bill_detail', function ($table) {
            $table->foreign('bill_id')->references('id')->on('bill');
        });
        Schema::table('comments', function ($table) {
            $table->foreign('prod_id')->references('id')->on('products');    
        });
        Schema::table('comments', function ($table) {
            $table->foreign('user_id_comment')->references('id')->on('user_table');
        });
         Schema::table('size', function ($table) {
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('bill', function ($table) {
            $table->foreign('user_id_bill')->references('id')->on('user_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $table->dropForeign('sub_categories_cat_id_foreign');
        $table->dropForeign('products_sub_id_foreign');
        $table->dropForeign('products_pro_id_foreign');
        $table->dropForeign('bill_detail_bill_id_foreign');
        $table->dropForeign('comments_prod_id_foreign');
        $table->dropForeign('comments_user_id_comment_foreign');
        $table->dropForeign('size_id_pro_foreign');
        $table->dropForeign('bill_user_id_bill_foreign');
    }
}
