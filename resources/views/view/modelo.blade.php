@extends('plantilla.menu')

@include('js.modelos')

@section('titulo','Modelo')
@section('cosmetic','active')

@section('busqueda')

    <label for="bs_marca"><b>Marca:</b> &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_marca" name="bs_marca">
      <option class="form-control mr-sm-2" value="" selected>Seleccione la marca</option>
      @if ($num_marca>0)
        @foreach ($marcas as $marcas2)
            <option value="{{ $marcas2->id }}">{{ $marcas2->marca }}</option>
        @endforeach
      @endif

    </select>

    <label for="bs_modelo"><b>Modelo:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_modelo" id="bs_modelo" onkeyup="mayuscula(this)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por modelo" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Marca</center></th>
    <th scope="col"><center>Modelo</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php $i=0 @endphp
        @foreach ($cons as $cons2)
            @php $i++ @endphp
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->marc }}</center></td>
                <td><center>{{ $cons2->modelo }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="4">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')

    <div class="form-group">
      <label for="marca"><b>Marca:</b></label>
      <select class="form-control" required id="marca" name="marca">
        <option value="null" disabled selected>Seleccione la marca</option>
        @if ($num_marca>0)
            @foreach ($marcas as $marcas2)
                <option value="{{ $marcas2->id }}">{{ $marcas2->marca }}</option>
            @endforeach
        @endif
      </select>
      <input type="hidden" id="marca2" name="marca2" />
      <small id="marca_e" style="color: red"></small>
    </div>

    <div class="form-group">
      <label for="modelo"><b>Modelo:</b></label>
      <input type="text" class="form-control" onkeyup="mayuscula(this)" maxlength="255" required id="modelo" name="modelo" />
      <input type="hidden" id="modelo2" name="modelo2" />
      <small id="modelo_e" style="color: red"></small>
    </div>

@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
