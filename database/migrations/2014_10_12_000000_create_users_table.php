<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
           // $table->foreignUuid('company_id')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('path_image')->nullable();
            $table->enum('gender',['M','F'])->default('M');  // + male or female 
            $table->text('adresse')->nullable();
            $table->string('pseudo')->nullable();
            $table->foreignUuid('role_id');
            $table->foreignUuid('deposit_id')->nullable();
            $table->foreignUuid('user_id')->nullable(); // create by user auth
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
