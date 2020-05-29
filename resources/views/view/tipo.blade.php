@extends('plantilla.menu')

@section('titulo','Tipo')
@section('cosmetic','active')

@section('busqueda')

    <label for="bs-tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-tipo" id="bs-tipo" class="form-control mr-sm-2" type="search" placeholder="Buscar por tipo" arialabel="Search" />

@endsection

@section('thead')

    <th scope="col"><center>Tipo</center></th>

@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
