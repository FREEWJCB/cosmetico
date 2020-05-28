<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetics', function (Blueprint $table) {
            $table->id();
            $table->string('cosmetico',100);
            $table->text('descripcion');
            $table->unsignedBigInteger('tipo');
            $table->unsignedBigInteger('modelo');
            $table->decimal('status',1,0)->default(1);
            $table->timestamps();
            $table->foreign('tipo')->references('id')->on('tipos');
            $table->foreign('modelo')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cosmetics');
    }
}
