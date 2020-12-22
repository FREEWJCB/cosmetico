@extends('plantilla.menu')

@include('js.cursos')

@section('titulo','Curso')
@section('pregunta','active')

@section('busqueda')

    <label for="bs_curso"><b>Curso:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_curso" id="bs_curso" onkeyup="mayuscula(this)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por curso" arialabel="Search" />

@endsection

@section('ventanas')

    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" id="button_curso" onclick = "return curso();" class="btn btn-secondary">Curso</button>
        <button type="button" id="button_pregunta" onclick = "return pregunta();" class="btn btn-secondary">Pregunta</button>
    </div>

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
        @php $i=0; @endphp
        @foreach ($cons as $cons2)
            @php $i++; @endphp
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

    <input type="hidden" id="preg_num" name="preg_num" />
    <input type="hidden" value="1" id="ventana" name="ventana" />
    <div id="curso_ventana">
        <div class="form-group">
          <label for="curso">Curso</label>
          <input type="text" required onkeyup="mayuscula(this)" maxlength="255" class="form-control" id="curso" name="curso" />
          <input type="hidden" id="curso2" name="curso2" />
          <small id="curso_e" style="color: red"></small>
        </div>
        <center><h2><b>Niveles</b></h2></center>
        <div class="form-row">
            <table class="table table-bordered" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nivel</th>
                        <th scope="col">Punto inicial</th>
                        <th scope="col">Punto final</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Básico</th>
                        <td scope="row"><center id='basico_i'>1</center></td>
                        <td>
                            <input type='number' required value='1' min='1' max='100' maxlength="3" name='basico_f' id='basico_f'>
                            <small id="basico_f_e" style="color: red"></small>
                            <input type="hidden" id="basico_f2" name="basico_f2" />
                        </td>
                    </tr>
                    <tr>
                        <th>Intermedio</th>
                        <td scope="row"><center id='intermedio_i'>1</center></td>
                        <td>
                            <input type='number' required value='1' min='1' max='100' maxlength="3" name='intermedio_f' id='intermedio_f'>
                            <small id="intermedio_f_e" style="color: red"></small>
                            <input type="hidden" id="intermedio_f2" name="intermedio_f2" />
                        </td>
                    </tr>
                    <tr>
                        <th>Avanzado</th>
                        <td scope="row"><center id='avanzado_i'>1</center></td>
                        <td>
                            <input type='number' required value='1' min='1' max='100' maxlength="3" name='avanzado_f' id='avanzado_f'>
                            <small id="avanzado_f_e" style="color: red"></small>
                            <input type="hidden" id="avanzado_f2" name="avanzado_f2" />
                        </td>
                    </tr>
                    <tr>
                        <th>Profesional</th>
                        <td scope="row"><center id='profesional_i'>1</center></td>
                        <td>
                            <input type='number' required value='1' min='1' max='100' maxlength="3" name='profesional_f' id='profesional_f'>
                            <small id="profesional_f_e" style="color: red"></small>
                            <input type="hidden" id="profesional_f2" name="profesional_f2" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style='display: none' id="pregunta_ventana">
        <div id="val_pregunta"></div>
        <div id="pregun"  class="form-group">
            <label for="respuestas">Pregunta:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-describedby="button-addon2" id="preguntas" name="preguntas" />
                <div  class="input-group-append">
                    <a href="#" onclick = "return agreg_pre('si');" class="btn btn-success btncolorblanco">
                        <i class="fa fa-plus"></i> Agregar
                    </a>
                </div>
            </div>
        </div>
        <div id="pregunta_r"></div>

    </div>

    <center>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" id="anterior" onclick = "return ante();" class="btn btn-secondary">Anterior</button>
            <button type="button" id="siguiente" onclick = "return sigui();" class="btn btn-secondary">Siguiente</button>
        </div>
    </center>
@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
