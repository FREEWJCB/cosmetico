@extends('plantilla.menu')

@include('js.state')

@section('titulo','Estado')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_states">Estado: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_states" id="bs_states" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por estado" arialabel="Search" />

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
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
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
      <label for="states">Estado</label>
      <input type="text" onkeyup="mayuscula(this)" required class="form-control" id="states" name="states" />
      <input type="hidden" id="states2" name="states2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
