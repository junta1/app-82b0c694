<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductMovimentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_moviment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku');
            $table->bigInteger('quantity');
            $table->string('moviment');
            $table->bigInteger('current_quantity')->nullable();
            $table->timestamps();

            $table->foreign('sku')->references('sku')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_moviment');
    }
}
