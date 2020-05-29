@extends('plantilla.menu')

@section('cosmetic','active')

@section('busqueda')

    <label for="bs-tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs-tipo" name="bs-tipo">
      <option value="" selected>Seleccione la tipo</option>
    </select>

    <label for="bs-marca">Marca: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs-marca" name="bs-marca">
      <option value="" selected>Seleccione la marca</option>
    </select>

    <label for="bs-modelo">Modelo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs-modelo" name="bs-modelo">
      <option value="" selected>Seleccione la modelo</option>
    </select>

    <label for="bs-cosmetico">Cosmetico: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-cosmetico" id="bs-cosmetico" class="form-control mr-sm-2" type="search" placeholder="Buscar por cosmetico" arialabel="Search" />

@endsection

@section('thead')

    <th scope="col"><center>Tipo</center></th>
    <th scope="col"><center>Marca</center></th>
    <th scope="col"><center>Modelo</center></th>
    <th scope="col"><center>Cosmetico</center></th>

@endsection


@section('script')

    <script src="{{ asset('js/cosmetic.js') }}" crossorigin="anonymous"></script>

@endsection


@section('contenido')

    @include('plantilla.tabla')

@endsection
