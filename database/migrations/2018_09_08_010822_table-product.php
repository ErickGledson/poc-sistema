<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->string('description', 254);
            $table->decimal('price', 9, 2);
            $table->integer('stock');
            $table->integer('category_id');
            $table->integer('provider_id');
            $table->string('provider_product_id');
            $table->string('image');
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
    }
}
