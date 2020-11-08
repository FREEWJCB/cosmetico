<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_nacimiento');
            $table->text('lugar_nacimiento');
            $table->text('descripcion');
            $table->unsignedBigInteger('persona')->unique();
            $table->decimal('status',1,0)->default(1);
            $table->foreign('persona')->references('id')->on('persona');
            $table->timestamps();
        });

        // Creación de la Vista view_estudiante
        DB::statement('
            CREATE OR REPLACE VIEW view_estudiante as
                SELECT
                e.id, p.nombre, p.apellido, p.sex, e.fecha_nacimiento,
                e.lugar_nacimiento, s.states, m.municipalitys
                FROM estudiante e
                INNER JOIN persona p
                ON e.persona = p.id
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
        // Eliminar Vista view_estudiante
        DB::statement('DROP VIEW IF EXISTS view_estudiante');

        Schema::dropIfExists('estudiante');
    }
}
