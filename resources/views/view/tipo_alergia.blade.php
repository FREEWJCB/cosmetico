@extends('plantilla.menu')

@include('js.tipo_alergia')

@section('titulo','Tipos Alergia')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_tipo"><b>Tipo:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_tipo" id="bs_tipo" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por tipo" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>Tipo</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php $i=0 @endphp
        @foreach ($cons as $cons2)
            @php $i++ @endphp
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->tipo }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="tipo"><b>Tipo:</b></label>
      <input type="text" onkeyup="mayuscula(this)" required onkeypress="return letra(event)" maxlength="255" class="form-control" id="tipo" name="tipo" />
      <input type="hidden" id="tipo2" name="tipo2" />
      <small id="tipo_e" style="color: red"></small>
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
