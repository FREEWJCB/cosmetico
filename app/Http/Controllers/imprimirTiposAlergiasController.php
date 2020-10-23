<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class imprimirTiposAlergiasController extends Controller
{
    public function imprimirTodos(Request $request){

        $data = DB::table('tipo_alergia')
            ->orderBy('id', 'asc')
            ->get();

        if($request->has('export')){
            if($request->get('export') == 'pdf'){
                return PDF::loadView('reports.tiposAlergia', compact('data'))->stream('reporteTipoAlergia.pdf');
                    //->download('reporteTipoAlergia.pdf');
                //->setPaper('dda4', 'landscape') // para tipo de hoja
            }
        }
        return view('view.tipo_alergia');

    }
}
