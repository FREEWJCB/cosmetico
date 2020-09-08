@extends('plantilla.menu')

@include('js.cursos')

@section('titulo','Curso')
@section('pregunta','active')

@section('busqueda')

    <label for="bs_curso">Curso: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_curso" id="bs_curso" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por curso" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Curso</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->curso }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="curso">Curso</label>
      <input type="text" required onkeyup="mayuscula(this)" class="form-control" id="curso" name="curso" />
      <input type="hidden" id="curso2" name="curso2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
