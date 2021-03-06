@extends('plantilla.menu')

@include('js.cosmeticos')

@section('cosmeticos','active')

@section('busqueda')

    <label for="bs_tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_tipo" id="bs_tipo" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por tipo" arialabel="Search" />

    <label for="bs_marca">Marca: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_marca" id="bs_marca" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por marca" arialabel="Search" />

    <label for="bs_modelo">Modelo: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_modelo" id="bs_modelo" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por modelo" arialabel="Search" />

    <label for="bs_cosmetico">Cosmetico: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cosmetico" id="bs_cosmetico" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por cosmetico" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Tipo</center></th>
    <th scope="col"><center>Marca</center></th>
    <th scope="col"><center>Modelo</center></th>
    <th scope="col"><center>Cosmetico</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->tipo }}</center></td>
                <td><center>{{ $cons2->marca }}</center></td>
                <td><center>{{ $cons2->modelo }}</center></td>
                <td><center>{{ $cons2->cosmetico }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="6">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="marca" name="marca" />
        <input type="hidden" id="marca2" name="marca2" />
      </div>

      <div class="form-group col-md-6">
        <label for="modelo">Modelo</label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="modelo" name="modelo" />
        <input type="hidden" id="modelo2" name="modelo2" />
      </div>

    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="tipo">Tipo</label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="tipo" name="tipo" />
        <input type="hidden" id="tipo2" name="tipo2" />
      </div>

      <div class="form-group col-md-6">
        <label for="cosmetico">Cosmetico</label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="cosmetico" name="cosmetico" />
        <input type="hidden" id="cosmetico2" name="cosmetico2" />
      </div>
    </div>

    <div class="form-group">
      <label for="descripcion">Descripción</label>
      <textarea type="text" class="form-control" required id="descripcion" name="descripcion"></textarea>
      <input type="hidden" id="descripcion2" name="descripcion2" />
    </div>

@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
