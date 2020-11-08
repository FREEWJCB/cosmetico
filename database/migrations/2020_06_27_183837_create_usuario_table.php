<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('username',100)->unique();
            $table->string('pregunta',100);
            $table->string('respuesta',100);
            $table->unsignedBigInteger('tipo');
            $table->unsignedBigInteger('empleado')->unique();
            $table->decimal('status',1,0)->default(1);
            $table->foreign('tipo')->references('id')->on('tipo_usuario');
            $table->foreign('empleado')->references('id')->on('empleado');
            $table->timestamps();
        });

        // Creación de la Vista view_usuario
        DB::statement('
            CREATE OR REPLACE VIEW view_usuario as
                SELECT
                u.id, u.username, u.created_at, tu.tipo,
                p.cedula, p.nombre, p.apellido, e.email
                FROM usuario u
                INNER JOIN empleado e
                ON u.empleado = e.id
                INNER JOIN persona p
                ON e.persona = p.id
                INNER JOIN tipo_usuario tu
                ON u.tipo = tu.id;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar Vista view_usuario
        DB::statement('DROP VIEW IF EXISTS view_usuario');

        Schema::dropIfExists('usuario');
    }
}
