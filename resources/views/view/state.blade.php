@extends('plantilla.menu')

@include('js.state')

@section('titulo','Estado')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_states">Estado: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_states" id="bs_states" onkeyup="mayuscula(this)"  onkeypress="return letra(event)" maxlength="255"b class="form-control mr-sm-2" type="text" placeholder="Buscar por estado" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>Estado</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php $i=0 @endphp
        @foreach ($cons as $cons2)
            @php $i++ @endphp
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->states }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="states"><b>Estado:</b></label>
      <input type="text" onkeyup="mayuscula(this)" required onkeypress="return letra(event)" maxlength="255" class="form-control" id="states" name="states" />
      <input type="hidden" id="states2" name="states2" />
      <small id="states_e" style="color: red"></small>

    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
