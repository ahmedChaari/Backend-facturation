<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_product', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('bon_id')->constrained();
            $table->foreignUuid('product_id')->constrained();
            $table->foreignUuid('source_id')->nullable()->references('id')->on('deposits');
            $table->foreignUuid('destination_id')->nullable()->references('id')->on('deposits');
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
        Schema::dropIfExists('bon_product');
    }
}
