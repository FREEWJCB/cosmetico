@extends('plantilla.menu')

@include('js.ocupacion_laboral')

@section('titulo','Ocupación Laboral')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_labor">Labor: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_labor" id="bs_labor" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por labor" arialabel="Search" />

@endsection

@section('reporte')
<a href="{{ URL::to('imprimirOcupacionLaboral?export=pdf') }}" id="reporte" class="btn btn-success ml-1" target="_blank">
                <i class="fas fa-user-plus"></i>Reporte
            </a>
@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>Labor</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->labor }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="labor">Labor</label>
      <input type="text" onkeyup="mayuscula(this)" required class="form-control" id="labor" name="labor" />
      <input type="hidden" id="labor2" name="labor2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
