<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\storeModelo;
use App\Http\Requests\Update\updateModelo;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = Modelo::select('modelos.*', 'marcas.marca as marc')
                    ->join('marcas', 'modelos.marca', '=', 'marcas.id')
                    ->where('modelos.status', '1')
                    ->orderBy('modelo','asc');
        $cons2 = $cons->get();
        $num = $cons->count();

        $marcas = Marca::where('status', '1')->orderBy('marca','asc');
        $marcas2 = $marcas->get();
        $num_marca = $marcas->count();

        return view('view.modelo',['cons' => $cons2, 'num' => $num, 'num_marca' => $num_marca, 'marcas' => $marcas2, 'js' => $js]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeModelo $request)
    {
        //
        $modelo = Modelo::where('modelos', $request->modelos);
        $num = $modelo->count();
        if ($num > 0) {
            # code...
            $modelo->update(['status' => 1]);
        }else{
            Modelo::create($request->all());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateModelo $request, Modelo $Modelo)
    {
        //
        $modelo = Modelo::where([['modelos', $request->modelos],['status', 0]]);
        $num = $modelo->count();
        $id=0;
        if ($num > 0) {
            $modelo1 = $modelo->get();
            foreach ($modelo1 as $modelo2) {
                # code...
                $id = $modelo2->id;
            }
            $modelo->update(['status' => 1]);
            $Modelo->update(['status' => 0]);
        }else{
            $Modelo->update($request->all());
        }

        return response()->json([
            'i' => $num,
            'id' => $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $Modelo)
    {
        //
        $Modelo->update(['status' => 0]);
    }

    public function cargar(Request $request)
    {
        $cat="";
        $marca=$request->bs_marca;
        $modelo=$request->bs_modelo;
        $cons = Modelo::select('modelos.*', 'marcas.marca as marc')
                    ->join('marcas', 'modelos.marca', '=', 'marcas.id')
                    ->where([
                        ['modelos.status', '1'],
                        ['modelos.marca', 'like', "%$marca%"],
                        ['modelo','like', "%$modelo%"]
                    ])->orderBy('modelo','asc');

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
        $modelo= Modelo::find($request->id);

        return response()->json([
            'marca'=>$modelo->marca,
            'modelo'=>$modelo->modelo
        ]);

    }
}
