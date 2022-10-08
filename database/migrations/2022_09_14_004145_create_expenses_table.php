<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('company_id');
            $table->date('date_expense');
            $table->foreignUuid('mode_payment_id'); 
            $table->integer('montant');
            $table->foreignUuid('expense_type_id');
            $table->date('date_echeance');
            $table->integer('numero_piece');
            $table->integer('tel_emitteur');
            //add the beneficiaire
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
        Schema::dropIfExists('expenses');
    }
}
