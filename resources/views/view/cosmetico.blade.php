@extends('plantilla.menu')

@section('cosmeticos','active')

@section('busqueda')

    <label for="bs-tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-tipo" id="bs-tipo" class="form-control mr-sm-2" type="search" placeholder="Buscar por tipo" arialabel="Search" />

    <label for="bs-marca">Marca: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-marca" id="bs-marca" class="form-control mr-sm-2" type="search" placeholder="Buscar por marca" arialabel="Search" />

    <label for="bs-modelo">Modelo: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-modelo" id="bs-modelo" class="form-control mr-sm-2" type="search" placeholder="Buscar por modelo" arialabel="Search" />

    <label for="bs-cosmetico">Cosmetico: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-cosmetico" id="bs-cosmetico" class="form-control mr-sm-2" type="search" placeholder="Buscar por cosmetico" arialabel="Search" />

@endsection

@section('thead')

    <th scope="col"><center>Tipo</center></th>
    <th scope="col"><center>Marca</center></th>
    <th scope="col"><center>Modelo</center></th>
    <th scope="col"><center>Cosmetico</center></th>

@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
