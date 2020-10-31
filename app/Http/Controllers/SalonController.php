<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\storeSalon;
use App\Http\Requests\Update\updateSalon;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($js="AJAX")
    {
        //
        $cons = Salon::where('status', '1')->orderBy('salones','asc');
        $cons2 = $cons->get();
        $num = $cons->count();
        return view('view.salon',['cons' => $cons2, 'num' => $num, 'js' => $js]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeSalon $request)
    {
        //
        Salon::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateSalon $request, Salon $Salon)
    {
        //
        $Salon->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salon $Salon)
    {
        //
        $Salon->delete();
    }

    public function cargar(Request $request)
    {
        $cat="";
        $salones=$request->bs_salones;
        $cons = Salon::where([
            ['status', '1'],
            ['salones','like', "%$salones%"]
        ])->orderBy('salones','asc');
        $cons1 = $cons->get();
        $num = $cons->count();
        if ($num>0) {
            # code...
            $i=0;
            foreach ($cons1 as $cons2) {
                # code...
                $i++;
                $id=$cons2->id;
                $salones=$cons2->salones;
                $cat.="<tr>
                        <th scope='row'><center>$i</center></th>
                        <td><center>$salones</center></td>
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
        $salon= Salon::find($request->id);

        return response()->json([
            'salones'=>$salon->salones
        ]);


    }
}
