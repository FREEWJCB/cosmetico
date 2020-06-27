<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representante', function (Blueprint $table) {
            $table->id();
            $table->string('parentesco',100);
            $table->unsignedBigInteger('ocupacion_laboral');
            $table->unsignedBigInteger('estudiante');
            $table->unsignedBigInteger('persona');
            $table->foreign('ocupacion_laboral')->references('id')->on('ocupacion_laboral');
            $table->foreign('estudiante')->references('id')->on('estudiante');
            $table->foreign('persona')->references('id')->on('persona');
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
        Schema::dropIfExists('representante');
    }
}