<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscapacidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discapacidad', function (Blueprint $table) {
            $table->id();
            $table->string('discapacidades',100)->unique();
            $table->text('descripcion');
            $table->unsignedBigInteger('tipo');
            $table->decimal('status',1,0)->default(1);
            $table->timestamps();
            $table->foreign('tipo')->references('id')->on('tipo_discapacidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discapacidad');
    }
}
