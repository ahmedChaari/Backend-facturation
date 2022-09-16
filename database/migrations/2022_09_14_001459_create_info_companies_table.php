<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('company_id');
            $table->string('SMTP');
            $table->string('SMTP_port');
            $table->string('SMTP_user');
            $table->string('SMTP_password');
            $table->string('map_key');
            $table->string('SMTP_email');
            $table->boolean('SMTP_send');
            $table->string('alert_day');
            $table->string('alert_groupe');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('info_companies');
    }
}
