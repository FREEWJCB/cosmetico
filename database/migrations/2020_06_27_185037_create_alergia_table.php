<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

        // Creación de la Vista view_alergia
        DB::statement('CREATE OR REPLACE VIEW view_alergia AS
                                      SELECT
                                      a.id,
                                      a.descripcion,
                                      a.alergias,
                                      ta.tipo,
                                      a.created_at
                                      FROM alergia a
                                      INNER JOIN tipo_alergia ta
                                      ON ta.id = a.tipo;
                              ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar Vista view_alergia
        DB::statement("DROP VIEW IF EXISTS view_alergia");

        Schema::dropIfExists('alergia');
    }
}
