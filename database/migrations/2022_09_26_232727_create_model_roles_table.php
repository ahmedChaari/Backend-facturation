<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('company_id');
            $table->foreignUuid('menu_id');
            $table->foreignUuid('sous_menu_id')->nullable();
            $table->foreignUuid('role_id');
            $table->boolean('consulter');
            $table->boolean('ajouter');
            $table->boolean('modifier');
            $table->boolean('valider');
            $table->boolean('supprimer');
            $table->boolean('imprimer');
            $table->boolean('exporter');
            $table->boolean('annuler');
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
        Schema::dropIfExists('model_roles');
    }
}
