<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->decimal('cedula',1,0)->unique();
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('sex',100);
            $table->string('telefono',11);
            $table->text('direccion',11);
            $table->unsignedBigInteger('municipality');
            $table->decimal('status',1,0)->default(1);
            $table->timestamps();
            $table->foreign('municipality')->references('id')->on('municipality');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}