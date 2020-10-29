<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\storeCosmetic;
use App\Http\Requests\Update\updateCosmetic;
use App\Models\Cosmetic;
use App\Models\Marca;
use App\Models\Tipo;
use Illuminate\Http\Request;

class cosmeticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = Cosmetic::select('cosmetics.*', 'modelos.modelo as model', 'marcas.marca as marc', 'tipos.tipo as tip')
                    ->join([
                        ['tipos', 'cosmetics.tipo', '=', 'tipos.id'],
                        ['modelos', 'cosmetics.modelo', '=', 'modelos.id'],
                        ['marcas', 'modelos.marca', '=', 'marcas.id']
                        ])
                    ->where('cosmetics.status', '1')
                    ->orderBy('cosmetico','asc');
        $cons2 = $cons->get();
        $num = $cons->count();

        $tipos = Tipo::where('status', '1')->orderBy('tipo','asc');
        $tipos2 = $tipos->get();
        $num_tipo = $tipos->count();

        $marcas = Marca::where('status', '1')->orderBy('marca','asc');
        $marcas2 = $marcas->get();
        $num_marca = $marcas->count();

        return view('view.cosmetic',['cons' => $cons2, 'num' => $num, 'marcas' => $marcas2, 'num_marca' => $num_marca, 'tipos' => $tipos2, 'num_tipo' => $num_tipo, 'js' => $js]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCosmetic $request)
    {
        //
        Cosmetic::create($request->all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateCosmetic $request, Cosmetic $Cosmetic)
    {
        //
        $Cosmetic->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cosmetic $Cosmetic)
    {
        //
        $Cosmetic->delete();
    }
    public function cargar(Request $request)
    {
        $cat="";
        $tipo=$request->bs_tipo;
        $marca=$request->bs_marca;
        $modelo=$request->bs_modelo;
        $cosmetico=$request->bs_cosmetico;

        $cons = Cosmetic::select('cosmetics.*', 'modelos.modelo as model', 'marcas.marca as marc', 'tipos.tipo as tip')
                    ->join([
                        ['tipos', 'cosmetics.tipo', '=', 'tipos.id'],
                        ['modelos', 'cosmetics.modelo', '=', 'modelos.id'],
                        ['marcas', 'modelos.marca', '=', 'marcas.id']
                        ])
                    ->where([
                        ['cosmetics.status', '1'],
                        ['cosmetics.tipo','like', "%$tipo%"],
                        ['modelos.marca','like', "%$marca%"],
                        ['cosmetics.modelo','like', "%$modelo%"],
                        ['cosmetico','like', "%$cosmetico%"]
                        ])
                    ->orderBy('cosmetico','asc');

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
                $marc=$cons2->marc;
                $model=$cons2->model;
                $cosmetico=$cons2->cosmetico;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$tip</center></td>
                        <td><center>$marc</center></td>
                        <td><center>$model</center></td>
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
        $cons= Cosmetic::where('cosmetics.id', $id)->join('modelos', 'cosmetics.modelo', '=', 'modelos.id')->get();

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
