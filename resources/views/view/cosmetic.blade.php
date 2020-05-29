@extends('plantilla.menu')

@section('cosmetic','active')

@section('thead')

    <th scope="col"><center>Tipo</center></th>
    <th scope="col"><center>Marca</center></th>
    <th scope="col"><center>Modelo</center></th>
    <th scope="col"><center>Cosmetico</center></th>

@endsection


@section('contenido')

    @include('plantilla.tabla')

@endsection
