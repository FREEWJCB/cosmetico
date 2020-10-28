<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class imprimirTiposUsuariosController extends Controller
{
    public function imprimirTodos(Request $request){

        $data = DB::table('tipo_usuario')
            ->orderBy('id', 'asc')
            ->get();

        if($request->has('export')){
            if($request->get('export') == 'pdf'){
                return PDF::loadView('reports.tiposUsuario', compact('data'))->stream('reporteTipoUsuario.pdf');
                    //->download('reporteTipoAlergia.pdf');
                //->setPaper('dda4', 'landscape') // para tipo de hoja
            }
        }
        return view('view.tipo_usuario');

    }

}
