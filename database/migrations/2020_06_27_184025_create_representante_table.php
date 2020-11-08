<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->unsignedBigInteger('persona');
            $table->unsignedBigInteger('ocupacion_laboral');
            $table->decimal('status',1,0)->default(1);
            $table->foreign('ocupacion_laboral')->references('id')->on('ocupacion_laboral');
            $table->foreign('persona')->references('id')->on('persona');
            $table->timestamps();
        });

        // Creación de la Vista view_representante
        DB::statement('
            CREATE OR REPLACE VIEW view_representante as
                SELECT
                r.id, p.nombre, p.apellido, p.sex,
                s.states, m.municipalitys, ol.labor
                FROM representante r
                INNER JOIN ocupacion_laboral ol
                ON r.ocupacion_laboral = ol.id
                INNER JOIN persona p
                ON r.persona = p.id
                INNER JOIN municipality m
                ON p.municipality = m.id
                INNER JOIN state s
                ON m.state = s.id;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar Vista view_representante
        DB::statement('DROP VIEW IF EXISTS view_representante');

        Schema::dropIfExists('representante');
    }
}
