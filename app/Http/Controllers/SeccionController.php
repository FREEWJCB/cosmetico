<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\storeSeccion;
use App\Http\Requests\Update\updateSeccion;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = Seccion::where('status', '1')->orderBy('secciones','asc');
        $cons2 = $cons->get();
        $num = $cons->count();
        return view('view.seccion',['cons' => $cons2, 'num' => $num, 'js' => $js]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeSeccion $request)
    {
        //
        Seccion::create($request->all());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateSeccion $request, Seccion $Seccion)
    {
        //
        $Seccion->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $Seccion)
    {
        //
        $Seccion->delete();
    }

    public function cargar(Request $request)
    {
        $cat="";
        $secciones=$request->bs_secciones;
        $cons = Seccion::where([
            ['status', '1'],
            ['secciones','like', "%$secciones%"]
        ])->orderBy('secciones','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            $i=0;
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $secciones=$cons2->secciones;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$secciones</center></td>
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
        $seccion= Seccion::find($request->id);

        return response()->json([
            'secciones'=>$seccion->secciones
        ]);


    }
}
