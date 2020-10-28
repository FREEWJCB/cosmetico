<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class imprimirTiposDiscapacidadController extends Controller
{
    public function imprimirTodos(Request $request){

        $data = DB::table('tipo_discapacidad')
            ->orderBy('id', 'asc')
            ->get();

        if($request->has('export')){
            if($request->get('export') == 'pdf'){
                return PDF::loadView('reports.tiposDiscapacidad', compact('data'))->stream('reporteTipoDiscapacidad.pdf');
                    //->download('reporteTipoAlergia.pdf');
                //->setPaper('dda4', 'landscape') // para tipo de hoja
            }
        }
        return view('view.tipo_discapacidad');

    }
}
