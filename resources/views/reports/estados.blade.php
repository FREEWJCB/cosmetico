@extends('reports.reporte')

@section('title', 'Estados')

@section('encabezado', 'Reporte de los Estados')

@section('encabezados')
    <tr>
        <th>#</th>
        <th scope="col">Estados</th>
        <th>Creado</th>
    </tr>
@endsection
@section('contenido')
    @if(count($data) > 0)
         @foreach($data as $row)
            <tr>
                <td scope="row">{{$row->id}}</td>
                <td>{{$row->states}}</td>
                <td>{{date("d-m-Y", strtotime($row->created_at))}}</td>
            </tr>
         @endforeach
    @endif
@endsection
