<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DemandPriceProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demand_price_product', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('demand_price_id')->constrained();
            $table->foreignUuid('product_id')->constrained();
            $table->integer('amount');
            $table->integer('price');
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
        Schema::dropIfExists('demand_price_product');
    }
}
