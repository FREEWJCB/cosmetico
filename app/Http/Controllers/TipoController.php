<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\tipo;
class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cons = DB::table('tipos')->where('status', '1')->orderBy('tipo','asc');
        $cons2 = $cons->get();
        $num = $cons->count();
        return view('view.tipo',['cons' => $cons2, 'num' => $num]);
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
        DB::table('tipos')->insert(['tipo' => $request->tipo]);

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
        DB::table('tipos')
        ->where('id', $id)
        ->update(['tipo' => $request->tipo]);
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
        \Log::info("tabla = ".$id);
        DB::table('tipos')->where('id', $id)->delete();


    }

    public function cargar(Request $request)
    {
        //
        // \Log::info($request->all());

        // return response()->json([
        //     'catalogo'=>$request->bs_tipo
        // ]);
        $tipo=$request->bs_tipo;
        $cons= DB::table('tipos')
                 ->where('tipo','like', "%$tipo%")
                 ->where('status', '1')
                 ->orderBy('tipo','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            $i=0;
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $tipo=$cons2->tipo;
                $cat="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$tipo</center></td>
                        <td>
                            <center class='navbar navbar-light'>
                                <a data-toggle='dropdown' onclick = \"return mostrar($id,'Mostrar');\" class='btn btn-info btncolorblanco' href='#' >
                                    <i class='fa fa-list-alt'></i>
                                </a>
                                <a data-toggle='dropdown' onclick = \"return mostrar($id,'Edicion');\" class='btn btn-success btncolorblanco' href='#' >
                                    <i class='fa fa-edit'></i>
                                </a>
                                <a data-toggle='dropdown' onclick ='return desactivar($id)' class='btn btn-danger btncolorblanco' href='#' >
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

    public function rellenar(Request $request)
    {
        $cons= DB::table('tipos')
                 ->where('id', $request->id);
        $cons2 = $cons->get();
        $tipo = $cons2->tipo;
        return response()->json([
            'tipo'=>$tipo
        ]);

    }
}
