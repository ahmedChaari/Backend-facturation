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
            $table->date('date_bon');   // Date de Bon + date_echeance
            $table->text('description')->nullable();
            $table->foreignUuid('deposit_id')->nullable();
            $table->boolean('valid');
            $table->string('bon_type');  // bon entre bon sorte ......
            $table->string('reference');
            $table->foreignUuid('user_id');  // user authen
            $table->foreignUuid('vendor_id')->nullable();  // fournisseur
            $table->string('name')->nullable();
            $table->enum('mode_relement',['ES','CQ','VR','CB','EF'])->nullable(); // ESPACE , CHEQUE , VERMENT , CARTE BANCAIRE , effet
            $table->integer('remise')->nullable();
            $table->softDeletes();
            $table->timestamps();
            //non non
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
