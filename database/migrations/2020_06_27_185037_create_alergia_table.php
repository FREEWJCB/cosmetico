<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlergiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergia', function (Blueprint $table) {
            $table->id();
            $table->string('alergias',100)->unique();
            $table->text('descripcion');
            $table->unsignedBigInteger('tipo');
            $table->decimal('status',1,0)->default(1);
            $table->timestamps();
            $table->foreign('tipo')->references('id')->on('tipo_alergia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alergia');
    }
}
