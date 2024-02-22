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
        Schema::create('delivery_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('product_code');
            $table->integer('quantity');

            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
            $table->foreign('product_code')->references('id')->on('catalog')->onDelete('cascade');
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
        Schema::dropIfExists('delivery_clothes');
    }
};
