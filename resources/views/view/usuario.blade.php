@extends('plantilla.menu')

@include('js.usuario')

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
                <td><center>{{ $cons2->nombre }}{{ $cons2->nombre }}</center></td>
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

    <div class="form-group">
        <label for="cedula">Cédula</label>
        <input type="text" class="form-control" required id="cedula" name="cedula" />
        <input type="text" style='display: none' required id="empleado" name="empleado" />
    </div>

    <div style='display: none' id="emp" class="form-row">
        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" readonly id="nombre" name="nombre" />
        </div>

        <div class="form-group col-md-6">
            <label for="cargo">Cargo</label>
            <input type="text" class="form-control" readonly id="cargo" name="cargo" />
        </div>
    </div>

    <div class="form-group">
        <label for="tipo">Tipo Usuario</label>
        <select class="form-control" id="tipo" name="tipo">
            <option value="" selected>Seleccione un tipo</option>
            @if ($num_tipo>0)
                @foreach ($tipo as $tipo2)
                    <option value="{{ $tipo2->id }}">{{ $tipo2->tipo }}</option>
                @endforeach
            @endif
        </select>
        <input type="hidden" id="tipo2" name="tipo2" />
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="pregunta">Pregunta de seguridad</label>
        <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="pregunta" name="pregunta" />
      </div>

      <div class="form-group col-md-6">
        <label for="respuesta">Respuesta de seguridad</label>
        <input type="password" class="form-control" required id="respuesta" name="respuesta" />
      </div>
    </div>

    <div class="form-row">
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
