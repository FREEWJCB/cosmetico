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


@section('form')

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" required id="marca" name="marca" />
        <input type="hidden" id="marca2" name="marca2" />
      </div>

      <div class="form-group col-md-6">
        <label for="modelo">Modelo</label>
        <input type="text" class="form-control" required id="modelo" name="modelo" />
        <input type="hidden" id="modelo2" name="modelo2" />
      </div>

    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="tipo">Tipo</label>
        <input type="text" class="form-control" required id="tipo" name="tipo" />
        <input type="hidden" id="tipo2" name="tipo2" />
      </div>

      <div class="form-group col-md-6">
        <label for="cosmetico">Cosmetico</label>
        <input type="text" class="form-control" required id="cosmetico" name="cosmetico" />
        <input type="hidden" id="cosmetico2" name="cosmetico2" />
      </div>
    </div>

    <div class="form-group">
      <label for="descripcion">Descripción</label>
      <textarea type="text" class="form-control" required id="descripcion" name="descripcion"></textarea>
      <input type="hidden" id="descripcion2" name="descripcion2" />
    </div>

@endsection


@section('script')

    <script src="{{ asset('js/cosmeticos.js') }}" crossorigin="anonymous"></script>

@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
