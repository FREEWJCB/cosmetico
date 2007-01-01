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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}