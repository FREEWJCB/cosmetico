<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePeriodoEscolarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_escolar', function (Blueprint $table) {
            $table->id();
            $table->string('ano',100);
            $table->unsignedBigInteger('seccion');
            $table->unsignedBigInteger('salon');
            $table->unsignedBigInteger('grado');
            $table->unsignedBigInteger('empleado');
            $table->decimal('status',1,0)->default(1);
            $table->foreign('seccion')->references('id')->on('seccion');
            $table->foreign('salon')->references('id')->on('salon');
            $table->foreign('grado')->references('id')->on('grado');
            $table->foreign('empleado')->references('id')->on('empleado');
            $table->timestamps();
        });

        // Creación de la Vista view_periodo_escolar
        DB::statement('
            CREATE OR REPLACE VIEW view_periodo_escolar as
                SELECT
                pe.id, p.nombre, p.apellido, g.grados,
                sc.secciones, s.salones, pe.created_at
                FROM periodo_escolar pe
                INNER JOIN empleado e
                ON pe.empleado = e.id
                INNER JOIN persona p
                ON e.persona = p.id
                INNER JOIN salon s
                ON pe.salon = s.id
                INNER JOIN seccion sc
                ON pe.seccion = sc.id
                INNER JOIN grado g
                ON pe.grado = g.id;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar Vista view_periodo_escolar
        DB::statement('DROP VIEW IF EXISTS view_periodo_escolar');

        Schema::dropIfExists('periodo_escolar');
    }
}
