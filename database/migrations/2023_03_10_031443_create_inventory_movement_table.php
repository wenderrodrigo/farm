<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_movement', function (Blueprint $table) {
            $table->id();
            
            $table->integer('type_movement')->comment('1 for incoming products and 2 for outgoing');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            
            $table->unsignedBigInteger('product_batch_id');
            $table->foreign('product_batch_id')->references('id')->on('product_batch');

            $table->integer('amount');
            $table->datetime('date_movement');
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
        Schema::dropIfExists('inventory_movement');
    }
};
