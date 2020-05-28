<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmeticos', function (Blueprint $table) {
            $table->id();
            $table->string('cosmetico',100);
            $table->text('descripcion');
            $table->string('tipo',100);
            $table->string('marca',100);
            $table->string('modelo',100);
            $table->decimal('status',1,0)->default(1);
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
        Schema::dropIfExists('cosmeticos');
    }
}
