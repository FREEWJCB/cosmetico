<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = DB::table('estudiante')
                    ->select('estudiante.*','persona.cedula','persona.nombre','persona.apellido','persona.sex','municipality.municipalitys','state.states')
                    ->join('persona', 'estudiante.persona', '=', 'persona.id')
                    ->join('municipality', 'persona.municipality', '=', 'municipality.id')
                    ->join('state', 'municipality.state', '=', 'state.id')
                    ->where('estudiante.status', '1')
                    ->orderBy('cedula','asc');
        $cons2 = $cons->get();
        $num = $cons->count();

        $state = DB::table('state')->where('status', '1')->orderBy('states','asc');
        $state2 = $state->get();
        $num_state = $state->count();

        $ocupacion_laboral = DB::table('ocupacion_laboral')->where('status', '1')->orderBy('labor','asc');
        $ocupacion_laboral2 = $ocupacion_laboral->get();
        $num_ocupacion_laboral = $ocupacion_laboral->count();

        $tipoa = DB::table('tipo_alergia')->where('status', '1')->orderBy('tipo','asc');
        $tipoa2 = $tipoa->get();
        $num_tipoa = $tipoa->count();

        $tipod = DB::table('tipo_discapacidad')->where('status', '1')->orderBy('tipo','asc');
        $tipod2 = $tipod->get();
        $num_tipod = $tipod->count();

        return view('view.Estudiante',['cons' => $cons2, 'num' => $num, 'state' => $state2, 'num_state' => $num_state, 'ocupacion_laboral' => $ocupacion_laboral2, 'num_ocupacion_laboral' => $num_ocupacion_laboral,'tipoa' => $tipoa2, 'num_tipoa' => $num_tipoa,'tipod' => $tipod2, 'num_tipod' => $num_tipod, 'js' => $js]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //estudiante
        DB::table('persona')->insert([
            'cedula' => $request->cedula,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'sex' => $request->sex,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'municipality' => $request->municipality
            ]);

        $cons = DB::table('persona')->where('cedula', $request->cedula)->get();

        foreach ($cons as $cons2) {
            # code...
            $persona=$cons2->id;
        }
        DB::table('estudiante')->insert([
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'lugar_nacimiento' => $request->lugar_nacimiento,
            'descripcion' => $request->descripcion,
            'persona' => $persona
            ]);

        $cons = DB::table('estudiante')->where('persona', $persona)->get();

        foreach ($cons as $cons2) {
            # code...
            $estudiante=$cons2->id;
        }

        $cons = DB::table('alergias');
        $cons1 = $cons->get();
        $num = $cons->count();

        if ($num>0) {
            # code...
            foreach ($cons1 as $cons2) {
                # code...
                $alergia=$cons2->alergia;
                DB::table('estudiante_alergia')->insert([
                    'estudiante' => $estudiante,
                    'alergia' => $alergia
                    ]);
            }
        }

        $cons = DB::table('discapacidades');
        $cons1 = $cons->get();
        $num = $cons->count();

        if ($num>0) {
            # code...
            foreach ($cons1 as $cons2) {
                # code...
                $discapacidad=$cons2->discapacidad;
                DB::table('estudiante_discapacidad')->insert([
                    'estudiante' => $estudiante,
                    'discapacidad' => $discapacidad
                    ]);
            }
        }
        $repre=$request->representante_regis;

        if ($repre==0) {
            # code...
            DB::table('persona')->insert([
                'cedula' => $request->cedula_r,
                'nombre' => $request->nombre_r,
                'apellido' => $request->apellido_r,
                'sex' => $request->sex_r,
                'telefono' => $request->telefono_r,
                'direccion' => $request->direccion_r,
                'municipality' => $request->municipality_r
                ]);

            $cons = DB::table('persona')->where('cedula', $request->cedula_r)->get();

            foreach ($cons as $cons2) {
                # code...
                $persona=$cons2->id;
            }

            DB::table('representante')->insert([
                'ocupacion_laboral' => $request->ocupacion_laboral,
                'persona' => $persona
                ]);

            $cons = DB::table('representante')->where('persona', $persona)->get();

            foreach ($cons as $cons2) {
                # code...
                $representante=$cons2->id;
            }
        } else {
            # code...
            $representante=$request->representante;
        }

        DB::table('estudiante_representante')->insert([
            'parentesco' => $request->parentesco,
            'estudiante' => $estudiante,
            'representante' => $representante
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function clear_a()
    {
        //
        DB::table('alergias')->delete();

    }

    public function clear_d()
    {
        //
        DB::table('discapacidades')->delete();

    }
}