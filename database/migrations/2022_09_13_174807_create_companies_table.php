<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->string('name');
            $table->date('date_creation');
            $table->string('ICE');
            $table->string('fiscale');
            $table->string('registre_commerce');
            $table->string('patent');
            $table->string('cnss');
            $table->string('activite');
            //$table->string('gerant');
            $table->string('contact');
            $table->text('adresse');
            $table->integer('tel');
            $table->integer('tel_mobile');
            $table->integer('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('logo')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('companies');
    }
}
