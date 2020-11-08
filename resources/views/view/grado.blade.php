@extends('plantilla.menu')

@include('js.grado')

@section('titulo','Grado')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_grados">Grado: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_grados" id="bs_grados" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por grado" arialabel="Search" />

@endsection

@section('reporte')
<a href="{{ URL::to('imprimirGrado?export=pdf') }}" id="reporte" class="btn btn-success ml-1" target="_blank">
                <i class="fas fa-user-plus"></i>Reporte
            </a>
@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>Grado</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->grados }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="grados">Grado</label>
      <input type="text" onkeyup="mayuscula(this)" required class="form-control" id="grados" name="grados" />
      <input type="hidden" id="grados2" name="grados2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
