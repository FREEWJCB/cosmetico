<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\storeDiscapacidad;
use App\Http\Requests\Update\updateDiscapacidad;
use App\Models\Discapacidad;
use App\Models\Tipo_discapacidad;
use Illuminate\Http\Request;
class DiscapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = Discapacidad::select('discapacidad.*', 'tipo_discapacidad.tipo as tip')
                    ->join('tipo_discapacidad', 'discapacidad.tipo', '=', 'tipo_discapacidad.id')
                    ->where('discapacidad.status', '1')
                    ->orderBy('discapacidades','asc');
        $cons2 = $cons->get();
        $num = $cons->count();

        $tipo_discapacidad = Tipo_discapacidad::where('status', '1')->orderBy('tipo','asc');
        $tipo_discapacidad2 = $tipo_discapacidad->get();
        $num_tipo = $tipo_discapacidad->count();

        return view('view.discapacidad',['cons' => $cons2, 'num' => $num, 'num_tipo' => $num_tipo, 'tipo_discapacidad' => $tipo_discapacidad2, 'js' => $js]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeDiscapacidad $request)
    {
        //
        Discapacidad::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateDiscapacidad $request, Discapacidad $Discapacidad)
    {
        //
        $Discapacidad->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discapacidad $Discapacidad)
    {
        //
        $Discapacidad->delete();
    }

    public function cargar(Request $request)
    {
        $cat="";
        $tipo=$request->bs_tipo;
        $discapacidades=$request->bs_discapacidades;
        $cons = Discapacidad::select('discapacidad.*', 'tipo_discapacidad.tipo as tip')
                    ->join('tipo_discapacidad', 'discapacidad.tipo', '=', 'tipo_discapacidad.id')
                    ->where([
                        ['discapacidad.status', '1'],
                        ['discapacidad.tipo', 'like', "%$tipo%"],
                        ['discapacidades','like', "%$discapacidades%"]
                        ])
                    ->orderBy('discapacidades','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            $i=0;
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $tip=$cons2->tip;
                $discapacidades=$cons2->discapacidades;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$tip</center></td>
                        <td><center>$discapacidades</center></td>
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
        $cons= Discapacidad::where('id', $id)->get();

        foreach ($cons as $cons2) {
            # code...
            $tipo=$cons2->tipo;
            $discapacidades=$cons2->discapacidades;
            $descripcion=$cons2->descripcion;

        }
        return response()->json([
            'tipo'=>$tipo,
            'discapacidades'=>$discapacidades,
            'descripcion'=>$descripcion
        ]);


    }
}