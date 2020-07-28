@extends('plantilla.menu')

@include('js.pregunta')

@section('pregunta','active')

@section('busqueda')

    <label for="bs_pregunta">Pregunta: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_pregunta" id="bs_pregunta" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por pregunta" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Preguna</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->preguntas }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="6">No hay datos registrados</td></tr>
    @endif

@endsection


@section('form')
    <input type="hidden" name="resp_num" id="resp_num" value="0">
    <div class="form-group">
        <label for="preguntas">Pregunta:</label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="preguntas" name="preguntas" />
        <input type="hidden" id="preguntas2" name="preguntas2" />
    </div>

    <div class="form-group">
        <label for="respuestas">Respuesta:</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" aria-describedby="button-addon2" id="respuestas" name="respuestas" />
            <div  class="input-group-append">
                <a href="#" onclick = "return agregar();" class="btn btn-success btncolorblanco">
                    <i class="fa fa-list"></i> Agregar
                </a>
            </div>
        </div>
    </div>

    <div id="resp">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            You should check in on some of those fields below. <strong>Puntos:</strong> <input type="number" class="custom-select my-1 mr-sm-2" value="0" min="0" max="99" name="puntos" id="puntos">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick = "return quitar();">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
