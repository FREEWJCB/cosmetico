@extends('plantilla.menu')

@include('js.municipality')

@section('titulo','Municipio')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_state">Estado: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs_state" name="bs_state">
      <option class="form-control mr-sm-2" value="" selected>Seleccione el estado</option>
      @if ($num_state>0)
        @foreach ($state as $state2)
            <option value="{{ $state2->id }}">{{ $state2->states }}</option>
        @endforeach
      @endif

    </select>

    <label for="bs_municipalitys">Municipio: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_municipalitys" id="bs_municipalitys" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por municipios" arialabel="Search"/>

@endsection

@section('reporte')
<a href="{{ URL::to('imprimirMunicipio?export=pdf') }}" id="reporte" class="btn btn-success ml-1" target="_blank">
                <i class="fas fa-user-plus"></i>Reporte
            </a>
@endsection


@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Estado</center></th>
    <th scope="col"><center>Municipio</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->states }}</center></td>
                <td><center>{{ $cons2->municipalitys }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="4">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')

    <div class="form-group">
      <label for="state">Estado</label>
      <select class="form-control" required id="state" name="state">
        <option value="null" disabled selected>Seleccione el estado</option>
        @if ($num_state>0)
            @foreach ($state as $state2)
                <option value="{{ $state2->id }}">{{ $state2->states }}</option>
            @endforeach
        @endif
      </select>
      <input type="hidden" id="state2" name="state2" />
    </div>

    <div class="form-group">
      <label for="municipalitys">Municipio</label>
      <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="municipalitys" name="municipalitys" />
      <input type="hidden" id="municipalitys2" name="municipalitys2" />
    </div>

@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
