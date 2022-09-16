<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('company_id');
            $table->string('name');
            $table->foreignUuid('deposit_id');
            $table->foreignUuid('deposit_destination_id');
            $table->date('date_bon');
            $table->foreignUuid('bon_type_id');
            $table->text('description');
            $table->foreignUuid('customer_id');
            $table->date('date_echeance');
            $table->enum('mode_relement',['ES','CQ','VR','CB','EF']); // ESPACE , CHEQUE , VERMENT , CARTE BANCAIRE , effet
            $table->integer('remise');
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
        Schema::dropIfExists('bons');
    }
}
