@extends('plantilla.menu')

@include('js.usuario')

@section('titulo','Usuario')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_cedula">Cédula: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cedula" id="bs_cedula" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por cédula" arialabel="Search"/>

    <label for="bs_nombre">Nombre: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_nombre" id="bs_nombre" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por nombre" arialabel="Search"/>

    <label for="bs_apellido">Apellido: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_apellido" id="bs_apellido" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por apellido" arialabel="Search"/>

    <label for="bs_email">Email: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_email" id="bs_email" class="form-control mr-sm-2" type="email" placeholder="Buscar por email" arialabel="Search"/>

    <label for="bs_tipo">Tipo Usuario: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_tipo" name="bs_tipo">
        <option value="" selected>Seleccione un tipo</option>
        @if ($num_tipo>0)
            @foreach ($tipo as $tipo2)
                <option value="{{ $tipo2->id }}">{{ $tipo2->tipo }}</option>
            @endforeach
        @endif
    </select>

    <label for="bs_username">Usuario: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_username" id="bs_username" class="form-control mr-sm-2" type="text" placeholder="Buscar por usuario" arialabel="Search"/>

@endsection

@section('reporte')
<a href="{{ URL::to('imprimirUsuario?export=pdf') }}" id="reporte" class="btn btn-success ml-1" target="_blank">
                <i class="fas fa-user-plus"></i>Reporte
            </a>
@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Cédula</center></th>
    <th scope="col"><center>Usuario</center></th>
    <th scope="col"><center>Nombre y Apellido</center></th>
    <th scope="col"><center>Email</center></th>
    <th scope="col"><center>Tipo Usuario</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->cedula }}</center></td>
                <td><center>{{ $cons2->username }}</center></td>
                <td><center>{{ $cons2->nombre }} {{ $cons2->nombre }}</center></td>
                <td><center>{{ $cons2->email }}</center></td>
                <td><center>{{ $cons2->tip }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="6">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')
    <input type="hidden" name="empleado" id="empleado">
    <div id="emple" class="form-group">
        <label for="cedula">Empleado</label>
        <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Buscar por cédula" arialabel="Buscar por cédula" aria-describedby="button-addon2" required id="cedula" name="cedula" />

            <div data-turbolinks="false" class="input-group-append">

                <a href="#" id="emplea" onclick = "return empleado();" class="btn btn-success btncolorblanco">
                    <i class="fa fa-search"></i>
                </a>

                <a href="#" style='display: none' id="cance" onclick = "return cancelar();" class="btn btn-danger btncolorblanco">
                    <i class="fa fa-times-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <div style='display: none' id="siempleado" class="form-row">

        <div class="form-group col-md-6">
            <label for="profe">Nombre y apellido</label>
            <input type="text" class="form-control" disabled id="nombre" name="nombre" />
        </div>

        <div class="form-group col-md-6">
            <label for="cargo">Cargo</label>
            <input type="text" class="form-control" disabled id="cargo" name="cargo" />
        </div>

    </div>

    <div style='display: none' id="noempleado" class="form-group">
        <div class="alert alert-danger" role="alert">
            <center>
                ¡La cédula introducida no existe! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{route('Empleado.index')}}" class="btn btn-danger btncolorblanco" target="_blank" rel="noopener noreferrer"><i class="fa fa-user-plus"></i> Registrar</a>
            </center>
        </div>
    </div>
    <div class="form-row">
        <div id="usu" class="form-group col-md-6">
            <label for="username">Usuario</label>
            <input type="text" class="form-control" required id="username" name="username" />
        </div>
        <div class="form-group col-md-6">
            <label for="tipo">Tipo Usuario</label>
            <select class="form-control" id="tipo" name="tipo">
                <option value="null" selected>Seleccione un tipo</option>
                @if ($num_tipo>0)
                    @foreach ($tipo as $tipo2)
                        <option value="{{ $tipo2->id }}">{{ $tipo2->tipo }}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" id="tipo2" name="tipo2" />
        </div>
    </div>

    <div id="pregu" class="form-row">
      <div class="form-group col-md-6">
        <label for="pregunta">Pregunta de seguridad</label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="pregunta" name="pregunta" />
      </div>

      <div id="resp" class="form-group col-md-6">
        <label for="respuesta">Respuesta de seguridad</label>
        <input type="password" class="form-control" required id="respuesta" name="respuesta" />
      </div>
    </div>

    <div id="passw" class="form-row">
        <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" required id="password" name="password" />
        </div>

        <div class="form-group col-md-6">
            <label for="respuesta">Confirmar Password</label>
            <input type="password" class="form-control" required id="password2" name="password2" />
        </div>
    </div>



@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
