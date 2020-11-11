@extends('plantilla.menu')

@include('js.representante')

@section('titulo','Representante')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_cedula"><b>Cédula:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cedula" id="bs_cedula" maxlength="8" class="form-control mr-sm-2" type="number" placeholder="Buscar por cédula" arialabel="Search"/>

    <label for="bs_nombre"><b>Nombre:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_nombre" id="bs_nombre" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por nombre" arialabel="Search"/>

    <label for="bs_apellido"><b>Apellido:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_apellido" id="bs_apellido" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por apellido" arialabel="Search"/>

    <label for="bs_sex"><b>Sexo:</b> &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_sex" name="bs_sex">
        <option value="" selected>Seleccione un sexo</option>
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
    </select>

    <label for="bs_ocupacion_laboral"><b>Ocupación Laboral:</b> &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_ocupacion_laboral" name="bs_ocupacion_laboral">
        <option value="" selected>Seleccione un labor</option>
        @if ($num_ocupacion_laboral>0)
            @foreach ($ocupacion_laboral as $ocupacion_laboral2)
                <option value="{{ $ocupacion_laboral2->id }}">{{ $ocupacion_laboral2->labor }}</option>
            @endforeach
        @endif
    </select>

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Cédula</center></th>
    <th scope="col"><center>Nombre y Apellido</center></th>
    <th scope="col"><center>Sexo</center></th>
    <th scope="col"><center>Estado</center></th>
    <th scope="col"><center>Municipio</center></th>
    <th scope="col"><center>Labor</center></th>
@endsection

@section('tbody')

    @if ($num > 0)
        @php $i=0 @endphp
        @foreach ($cons as $cons2)
            @php $i++ @endphp
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->cedula }}</center></td>
                <td><center>{{ $cons2->nombre }} {{ $cons2->apellido }}</center></td>
                <td><center>{{ $cons2->sex }}</center></td>
                <td><center>{{ $cons2->states }}</center></td>
                <td><center>{{ $cons2->municipalitys }}</center></td>
                <td><center>{{ $cons2->labor }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="6">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')

    <input type="hidden" id="persona" name="persona" />
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cedula"><b>Cedula:</b></label>
            <input type="number" class="form-control" maxlength="8" required id="cedula" name="cedula" />
            <small id="cedula_e" style="color: red"></small>
        </div>

        <div class="form-group col-md-6">
            <label for="nombre"><b>Nombre:</b></label>
            <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="nombre" name="nombre" />
            <input type="hidden" id="nombre2" name="nombre2" />
            <small id="nombre_e" style="color: red"></small>
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="apellido"><b>Apellido:</b></label>
            <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="apellido" name="apellido" />
            <input type="hidden" id="apellido2" name="apellido2" />
            <small id="apellido_e" style="color: red"></small>
        </div>

        <div class="form-group col-md-6">
            <label for="sex"><b>Sexo:</b></label>
            <select class="form-control" required id="sex" name="sex">
                <option value="null" disabled selected>Seleccione un sexo</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
            </select>
            <input type="hidden" id="sex2" name="sex2" />
            <small id="sex_e" style="color: red"></small>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="telefono"><b>Telefono:</b></label>
            <input type="tel" class="form-control" maxlength="11" required id="telefono" name="telefono" />
            <input type="hidden" id="telefono2" name="telefono2" />
            <small id="telefono_e" style="color: red"></small>
        </div>

        <div class="form-group col-md-6">
            <label for="ocupacion_laboral"><b>Ocupación Laboral:</b></label>
            <select class="form-control" required id="ocupacion_laboral" name="ocupacion_laboral">
                <option value="null" disabled selected>Seleccione un labor</option>
                @if ($num_ocupacion_laboral>0)
                    @foreach ($ocupacion_laboral as $ocupacion_laboral2)
                        <option value="{{ $ocupacion_laboral2->id }}">{{ $ocupacion_laboral2->labor }}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" id="ocupacion_laboral2" name="ocupacion_laboral2" />
            <small id="ocupacion_laboral_e" style="color: red"></small>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="state"><b>Estado:</b></label>
            <select class="form-control" required id="state" name="state">
                <option value="null" disabled selected>Seleccione un estado</option>
                @if ($num_state>0)
                    @foreach ($state as $state2)
                        <option value="{{ $state2->id }}">{{ $state2->states }}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" id="state2" name="state2" />
            <small id="state_e" style="color: red"></small>
        </div>

        <div class="form-group col-md-6">
            <label for="municipality"><b>Municipio:</b></label>
            <select class="form-control" required id="municipality" name="municipality">
                <option value="null" disabled selected>Seleccione un municipio</option>
            </select>
            <input type="hidden" id="municipality2" name="municipality2" />
            <small id="municipality_e" style="color: red"></small>
        </div>
    </div>

    <div class="form-group">
        <label for="direccion"><b>Dirección:</b></label>
        <textarea class="form-control" required id="direccion" name="direccion"></textarea>
        <input type="hidden" id="direccion2" name="direccion2" />
        <small id="direccion_e" style="color: red"></small>
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
