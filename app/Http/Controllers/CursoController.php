<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\storeCurso;
use App\Http\Requests\Update\updateCurso;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = Curso::where('status', '1')->orderBy('curso','asc');
        $cons2 = $cons->get();
        $num = $cons->count();
        return view('view.curso',['cons' => $cons2, 'num' => $num, 'js' => $js]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCurso $request)
    {
        //
        $basico_f=$request['basico_f'];
        $intermedio_i=$basico_f+1;
        $intermedio_f=$request['intermedio_f'];
        $avanzado_i=$intermedio_f+1;
        $avanzado_f=$request['avanzado_f'];
        $profesional_i=$avanzado_f+1;
        $profesional_f=$request['profesional_f'];

        $curso = Curso::create($request->all());
        $id = $curso->id;

        DB::table('nivel')->insert([
            ['niveles' => 'Basico', 'inicial' => 1, 'final' => $basico_f, 'cursos' => $id],
            ['niveles' => 'Intermedio', 'inicial' => $intermedio_i, 'final' => $intermedio_f, 'cursos' => $id],
            ['niveles' => 'Avanzado', 'inicial' => $avanzado_i, 'final' => $avanzado_f, 'cursos' => $id],
            ['niveles' => 'Profesional', 'inicial' => $profesional_i, 'final' => $profesional_f, 'cursos' => $id]
        ]);

        $cons = DB::table('preguntas')->orderBy('id','asc');

        $cons1 = $cons->get();
        $num = $cons->count();

        if($num > 0){

            foreach ($cons1 as $cons2) {
                # code...
                $id_p = $cons2->id;
                $pregunta = $cons2->pregunta;

                DB::table('pregunta')->insert(['preguntas' => $pregunta, 'cursos' => $id]);

                $consu = DB::table('pregunta')->where([
                    ['preguntas',$pregunta],
                    ['cursos',$id]
                ])->get();

                foreach ($consu as $consu2) {
                    # code...
                    $pregunta = $consu2->id;

                    $consul = DB::table('respuestas')->where('preguntas',$id_p)->orderBy('id','asc')->get();

                    foreach ($consul as $consul2) {
                        # code...
                        $respuestas=$consul2->respuesta;
                        $puntos=$consul2->puntos;
                        DB::table('respuesta')->insert(['pregunta' => $pregunta, 'respuestas' => $respuestas, 'puntos' => $puntos]);

                    }

                }
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateCurso $request, Curso $Curso)
    {
        //

        $id=$request['id'];
        $basico_f=$request['basico_f'];
        $intermedio_i=$basico_f+1;
        $intermedio_f=$request['intermedio_f'];
        $avanzado_i=$intermedio_f+1;
        $avanzado_f=$request['avanzado_f'];
        $profesional_i=$avanzado_f+1;
        $profesional_f=$request['profesional_f'];
        $Curso->update($request->all());

        DB::table('nivel')->where([
            ['niveles','Basico'],
            ['cursos',$id]
        ])->update(['final' => $basico_f]);

        DB::table('nivel')->where([
            ['niveles','Intermedio'],
            ['cursos',$id]
        ])->update(
            ['inicial' => $intermedio_i],
            ['final' => $intermedio_f]
        );

        DB::table('nivel')->where([
            ['niveles','Avanzado'],
            ['cursos',$id]
        ])->update(
            ['inicial' => $avanzado_i],
            ['final' => $avanzado_f],
        );

        DB::table('nivel')->where([
            ['niveles','Profesional'],
            ['cursos',$id]
        ])->update(
            ['inicial' => $profesional_i],
            ['final' => $profesional_f],
        );

        $consu = DB::table('pregunta')->where('cursos',$id)->get();
        foreach ($consu as $consu2) {
            $id_p = $consu2->id;
            DB::table('respuesta')->where('pregunta', $id_p)->delete();
        }
        DB::table('pregunta')->where('cursos',$id)->delete();
        $cons = DB::table('preguntas')->orderBy('id','asc');

        $cons1 = $cons->get();
        $num = $cons->count();

        if($num > 0){

            foreach ($cons1 as $cons2) {
                # code...
                $id_p = $cons2->id;
                $pregunta = $cons2->pregunta;

                DB::table('pregunta')->insert(['preguntas' => $pregunta, 'cursos' => $id]);

                $consu = DB::table('pregunta')->where([
                    ['preguntas',$pregunta],
                    ['cursos',$id]
                ])->get();

                foreach ($consu as $consu2) {
                    # code...
                    $pregunta = $consu2->id;

                    $consul = DB::table('respuestas')->where('preguntas',$id_p)->orderBy('id','asc')->get();

                    foreach ($consul as $consul2) {
                        # code...
                        $respuestas=$consul2->respuesta;
                        $puntos=$consul2->puntos;
                        DB::table('respuesta')->insert(['pregunta' => $pregunta, 'respuestas' => $respuestas, 'puntos' => $puntos]);

                    }

                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $Curso)
    {
        //
        $id = $Curso->id;
        $cons = DB::table('pregunta')->where('cursos', $id)->orderBy('id','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            foreach ($cons1 as $cons2) {
                # code...
                $id_p=$cons2->id;

                DB::table('respuesta')->where('pregunta', $id_p)->delete();
            }
            DB::table('pregunta')->where('cursos', $id)->delete();
        }
        DB::table('nivel')->where('cursos', $id)->delete();
        $Curso->delete();
    }

    public function cargar(Request $request)
    {
        $cat="";
        $curso=$request->bs_curso;
        $cons = Curso::where([
            ['status', '1'],
            ['curso','like', "%$curso%"]
            ])->orderBy('curso','asc');

        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            $i=0;
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $curso=$cons2->curso;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$curso</center></td>
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
            $cat="<tr><td colspan='3'>No hay datos registrados</td></tr>";
        }
        return response()->json([
            'catalogo'=>$cat
        ]);

    }

    public function mostrar(Request $request)
    {
        //
        $id = $request->id;
        $curso = Curso::find($id);

        $cons = DB::table('nivel')->where('cursos', $id)->get();
        foreach ($cons as $cons2) {
            # code...
            if ($cons2->niveles == 'Basico') {
                # code...
                $basico_f = $cons2->final;
            } else if ($cons2->niveles == 'Intermedio'){
                # code...
                $intermedio_i = $cons2->inicial;
                $intermedio_f = $cons2->final;
            } else if ($cons2->niveles == 'Avanzado'){
                # code...
                $avanzado_i = $cons2->inicial;
                $avanzado_f = $cons2->final;
            } else if ($cons2->niveles == 'Profesional'){
                # code...
                $profesional_i = $cons2->inicial;
                $profesional_f = $cons2->final;
            }

        }

        $cons = DB::table('pregunta')->where('cursos', $id)->get();

        foreach ($cons as $cons2){

            $pregunta = $cons2->id;
            $preguntas = $cons2->preguntas;
            DB::table('preguntas')->insert(['pregunta' => $preguntas]);

            $consu = DB::table('preguntas')->where('pregunta', $preguntas)->get();

            foreach ($consu as $consu2){

                $idpreguntas = $consu2->id;
                $consul = DB::table('respuesta')->where('pregunta', $pregunta)->get();

                foreach ($consul as $consul2){
                    $respuestas = $consul2->respuestas;
                    $puntos = $consul2->puntos;

                    DB::table('respuestas')->insert(['respuesta' => $respuestas, 'preguntas' => $idpreguntas, 'puntos' => $puntos]);
                }
            }

        }


        return response()->json([
            'curso'=>$curso->curso,
            'basico_f'=>$basico_f,
            'intermedio_i'=>$intermedio_i,
            'intermedio_f'=>$intermedio_f,
            'avanzado_i'=>$avanzado_i,
            'avanzado_f'=>$avanzado_f,
            'profesional_i'=>$profesional_i,
            'profesional_f'=>$profesional_f
        ]);


    }

    public function agreg_pre(Request $request)
    {
        //

        $id="";
        $ag=$request['ag'];
        $pro=$request['pro'];
        $readonly="";
        $ocul="style='display: none'";
        if ($pro == "Mostrar") {
            $readonly="readonly='readonly'";
        }
        if($ag == "si"){
            DB::table('preguntas')->insert(['pregunta' => $request->preguntas]);
        }

        $cons = DB::table('preguntas')->orderBy('id','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        $i=0;
        $preguntas="";
        $ocultar="";
        if ($num > 0) {
            # code...
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $pregunta=$cons2->pregunta;
                if ($i==$num && $ag == "si") {
                    # code...
                    $ocultar="style='display: none'";
                }
                // tabla titulo de la pregunta
                $preguntas.="
                <div id='preg$id' $ocultar>
                    <table class='table table-bordered'>
                        <thead class='thead-dark'>
                            <tr>
                                <th scope='col' colspan='2'>
                                    <center>
                                        #$i $pregunta";
                // boton del icono "x"
                if ($pro != "Mostrar") {
                    $preguntas.="<button type='button' id='pregun$id' class='close' data-dismiss='alert' aria-label='Close' onclick='return quitar_p($id);'>
                                    <span aria-hidden='true'>&times;</span>
                                 </button>";
                }
                // cerrando fila del titulo de la pregunta
                $preguntas.="</center></th></tr>";
                if ($pro != "Mostrar") {
                    # code...
                    $preguntas.="<tr class='bg-primary'>
                                    <th scope='col'><center>Respuesta</center></th>
                                    <th scope='col'><center>Agregar</center></th>
                                </tr>";
                }

                $preguntas.="</thead>";
                if ($pro != "Mostrar") {

                    $preguntas.="<tbody>
                                    <tr>
                                        <td>
                                            <input type='text' class='form-control' $readonly aria-describedby='button-addon2' id='respuestas$id' name='respuestas$id'/>
                                        </td>
                                        <td>
                                            <center>
                                                <a href='#' onclick = 'return agreg_resp($id,\"si\");' class='btn btn-success btncolorblanco'>
                                                    <i class='fa fa-plus'></i>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>";
                }
                $preguntas.=" </table>";
                $consu = DB::table('respuestas')->where('preguntas',$id)->orderBy('id','asc');
                $consu1 = $consu->get();
                $num1 = $consu->count();

                $preguntas.="";
                if ($num1>0) {
                    # code...
                    $preguntas.="
                    <input type='hidden' value='1' id='resp_num$id' name='resp_num$id' />
                    <div id='respuesta_r$id'>
                        <table class='table table-bordered'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'><center>#</center></th>
                                    <th scope='col'><center>Respuestas</center></th>
                                    <th scope='col'><center>Punto</center></th>";
                    if ($pro != "Mostrar") {
                        $preguntas.="<th scope='col'><center>Eliminar</center></th>";
                    }
                    $preguntas.="</tr>
                            </thead>
                            <tbody>";
                }else{
                    $preguntas.="
                    <input type='hidden' value='0' id='resp_num$id' name='resp_num$id' />
                    <div id='respuesta_r$id'>
                    ";
                }
                $n=0;
                foreach ($consu1 as $consu2) {
                    # code...
                    $n++;
                    $id_r=$consu2->id;
                    $respuesta=$consu2->respuesta;
                    $puntos=$consu2->puntos;

                    $preguntas.="
                    <tr id='resp$id$id_r'>
                        <th>$n</th>
                        <th>$respuesta</th>
                        <td><input type='number' required maxlength='2' $readonly onkeyup='puntos($id,$id_r)' class='my-1 mr-sm-2' value='$puntos' min='1' max='99' name='puntos$id$id_r' id='puntos$id$id_r'></td>";
                    if ($pro != "Mostrar") {
                        $preguntas.="
                            <td>
                                <center>
                                    <a href='#' onclick = 'return quitar_r($id,$id_r);' class='btn btn-danger btncolorblanco'>
                                        <i class='fa fa-trash'></i>
                                    </a>
                                </center>
                            </td>";
                    }
                    $preguntas.="</tr>";
                }

                if ($num1>0) {
                    # code...
                    $preguntas.="</tbody></table>";
                }

                $preguntas.="</div></div>";

            }
        }

        return response()->json([
            'pregunta'=>$preguntas,
            'num'=>$num,
            'id'=>$id
        ]);


    }

    public function agreg_resp(Request $request)
    {
        //
        $id_p=$request['id'];
        $ag=$request['ag'];
        if($ag == "si"){
            $respuesta=$request['respuestas'.$id_p];
            DB::table('respuestas')->insert([
                'respuesta' => $respuesta,
                'preguntas' => $id_p
                ]);
        }
        $cons = DB::table('respuestas')->where('preguntas',$id_p)->orderBy('id','asc');;
        $cons1 = $cons->get();
        $num = $cons->count();
        $i=0;
        $respuestas="";
        $ocultar="";
        if ($num>0) {
            # code...
            $respuestas.="
            <table class='table table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'><center>#</center></th>
                        <th scope='col'><center>Respuestas</center></th>
                        <th scope='col'><center>Punto</center></th>
                        <th scope='col'><center>Eliminar</center></th>
                    </tr>
                </thead>
                <tbody>";
        }
        foreach ($cons1 as $cons2) {
            # code...
            $i++;
            $id=$cons2->id;
            $respuesta=$cons2->respuesta;
            $puntos=$cons2->puntos;
            if ($i==$num) {
                # code...
                $ocultar="style='display: none'";
            }else{

                $puntos=$request['puntos'.$id_p.$id];
                // Console.log();
                DB::table('respuestas')->where('id', $id)->update(['puntos' => $puntos]);

            }
            $respuestas.="
            <tr $ocultar id='resp$id_p$id'>
                <th>$i</th>
                <th>$respuesta</th>
                <td><input type='number' onkeyup='puntos($id_p,$id)'  maxlength='2' required class='my-1 mr-sm-2' value='1' min='1' max='99' name='puntos$id_p$id' id='puntos$id_p$id'></td>
                <td>
                    <center>
                        <a href='#' onclick = 'return quitar_r($id_p,$id);' class='btn btn-danger btncolorblanco'>
                            <i class='fa fa-trash'></i>
                        </a>
                    </center>
                </td>
            </tr>";

        }
        if ($num>0) {
            # code...
            $respuestas.="</tbody></table>";
        }
        return response()->json([
            'respuesta'=>$respuestas,
            'num'=>$num,
            'id'=>$id
        ]);


    }

    public function puntos(Request $request)
    {
        //
        $id=$request['id'];
        $puntos=$request['puntos'];
        DB::table('respuestas')->where('id', $id)->update(['puntos' => $puntos]);


    }

    public function quitar_p(Request $request)
    {
        //
        $id=$request->id;
        DB::table('respuestas')->where('preguntas', $id)->delete();
        DB::table('preguntas')->where('id', $id)->delete();
        $num = DB::table('preguntas')->count();
        return response()->json([
            'num'=>$num
        ]);
    }

    public function quitar_r(Request $request)
    {
        //
        $id=$request->id;
        $id_r=$request->id_r;
        DB::table('respuestas')->where('id', $id_r)->delete();
        $num = DB::table('respuestas')->where('preguntas', $id)->count();
        return response()->json([
            'num'=>$num
        ]);
    }

    public function clear_p()
    {
        //
        DB::table('respuestas')->delete();
        DB::table('preguntas')->delete();
    }

    public function clear_r(Request $request)
    {
        //
        $id=$request->id;
        DB::table('respuestas')->where('preguntas', $id)->delete();
    }

    public function val_pregunta()
    {
        //
        $cons = DB::table('preguntas')->orderBy('id','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        $boo = true;
        $mensaje="";
        $icono = "<br><i class='fa fa-trash-alt'></i>";
        if($num > 0){
            foreach ($cons1 as $cons2) {
                # code...
                $id_p = $cons2->id;
                $consul = DB::table('respuestas')->where('preguntas',$id_p)->orderBy('id','asc')->get();
                $num2 = $consul->count();
                if($num2 < 2){
                    $boo = false;
                    $mensaje.="$icono Las preguntas deben tener mínimo 2 respuestas.";
                }
            }
        }else{
            $boo = false;
            $mensaje.="$icono No hay preguntas agregadas.";
        }
        if($num < 2){
            $boo = false;
            $mensaje.="$icono deben tener mínimo 2 preguntas.";
        }
        return response()->json([
            'boo'=>$boo,
            'mensaje'=>$mensaje
        ]);
    }


}
