@extends('reports.reporte')

@section('title', 'Tipos de Alergias')

@section('encabezados')
    <tr>
        <th>#</th>
        <th scope="col">Tipo</th>
        <th>Estatus</th>
    </tr>
@endsection
@section('contenido')
    @if(count($data) > 0)
         @foreach($data as $row)
            <tr>
                <td scope="row">{{$row->id}}</td>
                <td>{{$row->tipo}}</td>
                <td>{{$row->status}}</td>
            </tr>
         @endforeach
    @endif
@endsection
