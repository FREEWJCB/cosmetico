<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

        // Creación de la Vista view_alergia
        DB::statement('
            CREATE OR REPLACE VIEW view_discapacidad AS
                                      SELECT
                                      d.id,
                                      d.descripcion,
                                      d.discapacidades,
                                      td.tipo,
                                      d.created_at
                                      FROM discapacidad d
                                      INNER JOIN tipo_discapacidad td
                                      ON td.id = d.tipo;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar Vista view_discapacidad
        DB::statement("DROP VIEW IF EXISTS view_discapacidad");

        Schema::dropIfExists('discapacidad');
    }
}
