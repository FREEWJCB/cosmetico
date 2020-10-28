@extends('plantilla.menu')

@include('js.cosmeticos')

@section('cosmeticos','active')

@section('busqueda')

    <label for="bs_tipo"><b>Tipo:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_tipo" id="bs_tipo" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por tipo" arialabel="Search" />

    <label for="bs_marca"><b>Marca:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_marca" id="bs_marca" onkeyup="mayuscula(this)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por marca" arialabel="Search" />

    <label for="bs_modelo"><b>Modelo:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_modelo" id="bs_modelo" onkeyup="mayuscula(this)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por modelo" arialabel="Search" />

    <label for="bs_cosmetico"><b>Cosmetico:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cosmetico" id="bs_cosmetico" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por cosmetico" arialabel="Search" />

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
        @php $i=0 @endphp
        @foreach ($cons as $cons2)
            @php $i++ @endphp
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
        <label for="marca"><b>Marca:</b></label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" maxlength="255" required id="marca" name="marca" />
        <input type="hidden" id="marca2" name="marca2" />
        <small id="marca_e" style="color: red"></small>
      </div>

      <div class="form-group col-md-6">
        <label for="modelo"><b>Modelo:</b></label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" maxlength="255" required id="modelo" name="modelo" />
        <input type="hidden" id="modelo2" name="modelo2" />
        <small id="modelo_e" style="color: red"></small>
      </div>

    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="tipo"><b>Tipo:</b></label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="tipo" name="tipo" />
        <input type="hidden" id="tipo2" name="tipo2" />
        <small id="tipo_e" style="color: red"></small>
      </div>

      <div class="form-group col-md-6">
        <label for="cosmetico"><b>Cosmetico:</b></label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="cosmetico" name="cosmetico" />
        <input type="hidden" id="cosmetico2" name="cosmetico2" />
        <small id="cosmetico_e" style="color: red"></small>
      </div>
    </div>

    <div class="form-group">
      <label for="descripcion"><b>Descripción:</b></label>
      <textarea type="text" class="form-control" required id="descripcion" name="descripcion"></textarea>
      <input type="hidden" id="descripcion2" name="descripcion2" />
      <small id="descripcion_e" style="color: red"></small>
    </div>

@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
