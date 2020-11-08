@extends('plantilla.menu')

@include('js.seccion')

@section('titulo','Sección')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_secciones">Sección: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_secciones" id="bs_secciones" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por seccion" arialabel="Search" />

@endsection

@section('reporte')
<a href="{{ URL::to('imprimirSeccion?export=pdf') }}" id="reporte" class="btn btn-success ml-1" target="_blank">
                <i class="fas fa-user-plus"></i>Reporte
            </a>
@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>Sección</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->secciones }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="secciones">Sección</label>
      <input type="text" onkeyup="mayuscula(this)" required class="form-control" id="secciones" name="secciones" />
      <input type="hidden" id="secciones2" name="secciones2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
