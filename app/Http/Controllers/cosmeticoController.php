<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\storeCosmetico;
use App\Models\Cosmetico;
use Illuminate\Http\Request;

class cosmeticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = Cosmetico::where('status', '1')->orderBy('cosmetico','asc');
        $cons2 = $cons->get();
        $num = $cons->count();
        return view('view.cosmetico',['cons' => $cons2, 'num' => $num, 'js' => $js]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCosmetico $request)
    {
        //
        Cosmetico::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cosmetico $Cosmetico)
    {
        //
        $Cosmetico->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cosmetico $Cosmetico)
    {
        //
        Cosmetico::delete();
    }

    public function cargar(Request $request)
    {
        $cat="";
        $tipo=$request->bs_tipo;
        $marca=$request->bs_marca;
        $modelo=$request->bs_modelo;
        $cosmetico=$request->bs_cosmetico;
        $cons = Cosmetico::where([
            ['status', '1'],
            ['tipo','like', "%$tipo%"],
            ['marca','like', "%$marca%"],
            ['modelo','like', "%$modelo%"],
            ['cosmetico','like', "%$cosmetico%"],
            ])->orderBy('cosmetico','asc');
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
                $marca=$cons2->marca;
                $modelo=$cons2->modelo;
                $cosmetico=$cons2->cosmetico;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$tipo</center></td>
                        <td><center>$marca</center></td>
                        <td><center>$modelo</center></td>
                        <td><center>$cosmetico</center></td>
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
        $cons= Cosmetico::where('id', $id)->get();

        foreach ($cons as $cons2) {
            # code...
            $tipo=$cons2->tipo;
            $marca=$cons2->marca;
            $modelo=$cons2->modelo;
            $descripcion=$cons2->descripcion;
            $cosmetico=$cons2->cosmetico;

        }
        return response()->json([
            'tipo'=>$tipo,
            'marca'=>$marca,
            'modelo'=>$modelo,
            'descripcion'=>$descripcion,
            'cosmetico'=>$cosmetico
        ]);


    }
}
