<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class imprimirOcupacionLaboralController extends Controller
{
    public function imprimirTodos(Request $request){

        $data = DB::table('ocupacion_laboral')
            ->orderBy('id', 'asc')
            ->get();

        if($request->has('export')){
            if($request->get('export') == 'pdf'){
                return PDF::loadView('reports.ocupacionLaboral', compact('data'))->stream('reporteOcupacionLaboral.pdf');
                    //->download('reporteTipoAlergia.pdf');
                //->setPaper('dda4', 'landscape') // para tipo de hoja
            }
        }
        return view('view.ocupacion_laboral');

    }

}
