<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = DB::table('pregunta')
                    ->where('status', '1')
                    ->orderBy('preguntas','asc');
        $cons2 = $cons->get();
        $num = $cons->count();

        return view('view.Pregunta',['cons' => $cons2, 'num' => $num, 'js' => $js]);
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
        DB::table('pregunta')->insert(['preguntas' => $request->preguntas]);
        $cons = DB::table('pregunta')->where('preguntas', $request->preguntas)->get();

        foreach ($cons as $cons2) {
            # code...
            $pregunta=$cons2->id;
        }

        $cons = DB::table('respuestas')->get();

        foreach ($cons as $cons2) {
            # code...
            $id=$cons2->id;
            $respuestas=$cons2->respuesta;
            $puntos=$request->puntos.$id;
            DB::table('respuesta')->insert([
                'pregunta' => $pregunta,
                'puntos' => $puntos,
                'respuestas' => $respuestas
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        DB::table('pregunta')->where('id', $request->id)->update(['preguntas' => $request->preguntas]);
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
        DB::table('preguntas')->where('id', $id)->delete();
    }

    public function cargar(Request $request)
    {
        $cat="";
        $preguntas=$request->bs_preguntas;
        $cons = DB::table('pregunta')
                ->where('preguntas','like', "%$preguntas%")
                ->where('preguntas.status', '1')
                ->orderBy('preguntas','asc');

        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            $i=0;
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $preguntas=$cons2->preguntas;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$preguntas</center></td>
                        <td>
                            <center data-turbolinks='false' class='navbar navbar-light'>
                                <a onclick = \"return mostrar($id,'Mostrar');\" class='btn btn-info btncolorblanco' href='#' >
                                    <i class='fa fa-list-alt'></i>
                                </a>
                                <a onclick = \"return mostrar($id,'Edicion');\" class='btn btn-success btncolorblanco' href='#' >
                                    <i class='fa fa-edit'></i>
                                </a>
                                <a onclick ='return desactivar($id)' class='btn btn-danger btncolorblanco' href='#' >
                                    <i class='fa fa-trash-alt'></i>
                                </a>
                            </center>
                        </td>
                    </tr>";

            }
        }else{
            $cat="<tr><td colspan='6'>No hay datos registrados</td></tr>";
        }
        return response()->json([
            'catalogo'=>$cat
        ]);

    }

    public function mostrar(Request $request)
    {
        //
        $id=$request->id;
        $cons= DB::table('pregunta')->where('id', $id)->get();

        foreach ($cons as $cons2) {
            # code...
            $preguntas=$cons2->preguntas;

        }
        $resp="";
        return response()->json([
            'preguntas'=>$preguntas,
            'resp'=>$resp
        ]);


    }

    public function clear()
    {
        //
        DB::table('respuestas')->delete();

    }

    public function quitar(Request $request)
    {
        //
        $id=$request->id;
        DB::table('respuestas')->where('id', $id)->delete();
        $num = DB::table('respuestas')->count();
        return response()->json([
            'num'=>$num
        ]);
    }

    public function respuestas(Request $request)
    {
        //

        DB::table('respuestas')->insert(['respuesta' => $request->respuestas]);

        $cons = DB::table('respuestas')->orderBy('id','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        $i=0;
        $respuestas="";
        $ocultar="";
        foreach ($cons1 as $cons2) {
            # code...
            $i++;
            $id=$cons2->id;
            $respuesta=$cons2->respuesta;
            if ($i==$num) {
                # code...
                $ocultar="style='display: none'";
            }
            $respuestas="
            <div id='resp$id' $ocultar class='alert alert-primary alert-dismissible fade show form-row' role='alert'>
                <div class='col-7'>$respuesta</div>
                <div class='col'><label for='puntos$id'><strong>Puntos:</strong></label></div>
                <div class='col'><input type='number' class='custom-select my-1 mr-sm-2' value='0' min='0' max='99' name='puntos$id' id='puntos$id'></div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close' onclick ='return quitar($id);'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";



        }

        return response()->json([
            'respuestas'=>$respuestas,
            'num'=>$num,
            'id'=>$id
        ]);


    }
}
