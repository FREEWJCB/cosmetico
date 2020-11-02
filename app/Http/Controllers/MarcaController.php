<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\storeMarca;
use App\Http\Requests\Update\updateMarca;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = Marca::where('status', '1')->orderBy('marca','asc');
        $cons2 = $cons->get();
        $num = $cons->count();
        return view('view.marca',['cons' => $cons2, 'num' => $num, 'js' => $js]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeMarca $request)
    {
        //
        $marca = Marca::where('marca', $request->marcas);
        $num = $marca->count();
        if ($num > 0) {
            # code...
            $marca->update(['status' => 1]);
        }else{
            Marca::create($request->all());
        }


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateMarca $request, Marca $Marca)
    {
        //
        $marca = Marca::where([['marca', $request->marca],['status', 0]]);
        $num = $marca->count();
        $id=0;
        if ($num > 0) {
            $marca1 = $marca->get();
            foreach ($marca1 as $marca2) {
                # code...
                $id = $marca2->id;
            }
            $marca->update(['status' => 1]);
            $Marca->update(['status' => 0]);
        }else{
            $Marca->update($request->all());
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
    public function destroy(Marca $Marca)
    {
        //
        $Marca->delete();
    }

    public function cargar(Request $request)
    {
        $cat="";
        $marca=$request->bs_marca;
        $cons= Marca::where([
                     ['status', '1'],
                     ['marca','like', "%$marca%"]
                 ])->orderBy('marca','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            $i=0;
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $marca=$cons2->marca;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$marca</center></td>
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
        $marca= Marca::find($request->id);

        return response()->json([
            'marca'=>$marca->marca
        ]);


    }
}
