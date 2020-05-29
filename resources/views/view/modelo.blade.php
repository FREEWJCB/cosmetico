@extends('plantilla.menu')

@section('titulo','Modelo')
@section('cosmetic','active')

@section('busqueda')

    <label for="bs-marca">Marca: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs-marca" name="bs-marca">
      <option value="" selected>Seleccione la marca</option>
    </select>

    <label for="bs-modelo">Modelo: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-modelo" id="bs-modelo" class="form-control mr-sm-2" type="search" placeholder="Buscar por modelo" arialabel="Search" />

@endsection

@section('thead')

    <th scope="col"><center>Marca</center></th>
    <th scope="col"><center>Modelo</center></th>

@endsection


@section('form')

    <div class="form-group">
      <label for="marca">Marca</label>
      <select class="form-control" required id="marca" name="marca">
        <option value="null" disabled selected>Seleccione la marca</option>
      </select>
      <input type="hidden" id="marca2" name="marca2" />
    </div>

    <div class="form-group">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" required id="modelo" name="modelo" />
      <input type="hidden" id="modelo2" name="modelo2" />
    </div>

@endsection

@section('script')

    <script src="{{ asset('js/modelo.js') }}" crossorigin="anonymous"></script>

@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
