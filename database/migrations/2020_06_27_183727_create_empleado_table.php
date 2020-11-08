<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->string('email',100)->unique();
            $table->unsignedBigInteger('cargo');
            $table->unsignedBigInteger('persona');
            $table->decimal('status',1,0)->default(1);
            $table->timestamps();
            $table->foreign('cargo')->references('id')->on('cargo');
            $table->foreign('persona')->references('id')->on('persona');

        });

        // Creación de la Vista view_empleado
        DB::statement('
            CREATE OR REPLACE VIEW view_empleado as
                SELECT
                e.id, p.cedula, p.nombre, p.apellido, p.sex, p.telefono,
                p.direccion, e.email, c.cargos, m.municipalitys, s.states
                FROM empleado e
                INNER JOIN persona p
                ON e.persona = p.id
                INNER JOIN cargo c
                ON e.cargo = c.id
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
        // Eliminar Vista view_empleado
        DB::statement("DROP VIEW IF EXISTS view_empleado");

        Schema::dropIfExists('empleado');
    }
}
