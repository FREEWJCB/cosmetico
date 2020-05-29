@extends('plantilla.menu')

@section('titulo','Modelo')
@section('cosmetic','active')

@section('thead')

    <th scope="col"><center>Marca</center></th>
    <th scope="col"><center>Modelo</center></th>

@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
