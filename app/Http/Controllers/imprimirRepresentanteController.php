<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class imprimirRepresentanteController extends Controller
{
    public function imprimirTodos(Request $request){

        $data = DB::table('view_representante')
            ->orderBy('id', 'asc')
            ->get();

        if($request->has('export')){
            if($request->get('export') == 'pdf'){
                return PDF::loadView('reports.representante', compact('data'))->setPaper('a4', 'letter')->stream('reporteRepresentante.pdf');
                    //->download('reporteTipoAlergia.pdf');
                //->setPaper('dda4', 'landscape') // para tipo de hoja
            }
        }
        return view('view.representante');

    }
}
