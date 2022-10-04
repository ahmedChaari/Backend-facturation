<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('company_id');
            $table->string('name');
            $table->string('organisation'); // particulier societe
            $table->foreignUuid('customer_type_id');
            $table->foreignUuid('customer_id'); //responsable
            $table->string('ICE');
            $table->text('ville');
            $table->integer('tel');
            $table->integer('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('rating')->nullable();  // Non-evalue / Faible / Moyen / Fort / Tres / Fort
            $table->text('adresse')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
