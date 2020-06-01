<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\modelo;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cons = DB::table('modelos')
                    ->select('modelos.*', 'marcas.marca as marc')
                    ->join('marcas', 'modelos.marca', '=', 'marcas.id')
                    ->where('modelos.status', '1')
                    ->orderBy('modelo','asc');
        $cons2 = $cons->get();
        $num = $cons->count();
        return view('view.modelo',['cons' => $cons2, 'num' => $num]);
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
        DB::table('modelos')->insert([
            'marca' => $request->marca,
            'modelo' => $request->modelo
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
        DB::table('modelos')->where('id', $request->id)->update([
            'marca' => $request->marca,
            'modelo' => $request->modelo
            ]);
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
        DB::table('modelos')->where('id', $id)->delete();
    }

    public function cargar(Request $request)
    {
        $cat="";
        $marca=$request->bs_marca;
        $modelo=$request->bs_modelo;
        $cons = DB::table('modelos')
                ->select('modelos.*', 'marcas.marca as marc')
                ->join('marcas', 'modelos.marca', '=', 'marcas.id')
                ->where('marca', 'like', "%$marca%")
                ->where('modelo','like', "%$modelo%")
                ->where('modelos.status', '1')
                ->orderBy('modelo','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            $i=0;
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $marc=$cons2->marc;
                $modelo=$cons2->modelo;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$marc</center></td>
                        <td><center>$modelo</center></td>
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
            $cat="<tr><td colspan='4'>No hay datos registrados</td></tr>";
        }
        return response()->json([
            'catalogo'=>$cat
        ]);

    }

    public function mostrar(Request $request)
    {
        //
        $id=$request->id;
        $cons= DB::table('modelos')
                 ->where('id', $id)->get();

        foreach ($cons as $cons2) {
            # code...
            $marca=$cons2->marca;
            $modelo=$cons2->modelo;

        }
        return response()->json([
            'marca'=>$marca,
            'modelo'=>$modelo
        ]);


    }
}
