<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMunicipalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipality', function (Blueprint $table) {
            $table->id();
            $table->string('municipalitys',100);
            $table->unsignedBigInteger('state');
            $table->decimal('status',1,0)->default(1);
            $table->timestamps();
            $table->foreign('state')->references('id')->on('state');

        });

            // Creación de la Vista view_alergia
            DB::statement('
                CREATE OR REPLACE VIEW view_municipality as
                    SELECT
                    m.id, m.municipalitys, m.created_at,
                    s.states FROM municipality m
                    INNER JOIN state s ON
                    m.state = s.id
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
        DB::statement("DROP VIEW IF EXISTS view_municipality");

        Schema::dropIfExists('municipality');
    }
}
