@extends('plantilla.menu')

@include('js.cargo')

@section('titulo','Cargo')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_cargos"><b>Cargo:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cargos" id="bs_cargos" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por cargo" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>Cargo</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php $i=0 @endphp
        @foreach ($cons as $cons2)
            @php $i++ @endphp
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->cargos }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="cargos"><b>Cargo:</b></label>
      <input type="text" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required class="form-control" id="cargos" name="cargos" />
      <input type="hidden" id="cargos2" name="cargos2" />
      <small id="cargos_e" style="color: red"></small>
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
