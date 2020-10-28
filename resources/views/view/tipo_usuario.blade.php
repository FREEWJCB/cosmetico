@extends('plantilla.menu')

@include('js.tipo_usuario')

@section('titulo','Tipo Usuario')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_tipo" id="bs_tipo" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por tipo" arialabel="Search" />

@endsection

@section('reporte')
<a href="{{ URL::to('imprimirTipoUsuario?export=pdf') }}" id="reporte" class="btn btn-success ml-1" target="_blank">
                <i class="fas fa-user-plus"></i>Reporte
            </a>
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
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
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
      <label for="tipo">Tipo</label>
      <input type="text" onkeyup="mayuscula(this)" required class="form-control" id="tipo" name="tipo" />
      <input type="hidden" id="tipo2" name="tipo2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
