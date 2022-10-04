<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('company_id');
            $table->string('reference');
            $table->foreignUuid('vendor_id');  // fournisseur
            $table->string('designation');
            $table->integer('prix_achat');
            $table->integer('prix_vente');
            $table->foreignUuid('category_id');
            $table->string('image');
            $table->enum('unite',['kg','metre','littre','piece']);
            $table->integer('code_bare');
            $table->integer('stock_min');
            $table->string('TVA');
            $table->boolean('actif');
            $table->string('rayon_a');
            $table->string('rayon_b');
            $table->foreignUuid('deposit_id');
            $table->integer('quantite_initial');
            $table->text('description');
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
        Schema::dropIfExists('products');
    }
}
