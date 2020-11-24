<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class imprimirMunicipioController extends Controller
{
    public function imprimirTodos(Request $request){

        $data = DB::table('view_municipality')
            ->orderBy('id', 'asc')
            ->get();

        if($request->has('export')){
            if($request->get('export') == 'pdf'){
                return PDF::loadView('reports.municipios', compact('data'))->setPaper('a4', 'letter')->stream('reporteMunicipio.pdf');
                    //->download('reporteTipoAlergia.pdf');
                //->setPaper('dda4', 'landscape') // para tipo de hoja
            }
        }
        return view('view.municipality');

    }
}
