@extends('plantilla.menu')

@include('js.estudiante')

@section('proyecto','active')

@section('busqueda')

    <label for="bs_cedula">Cédula: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cedula" id="bs_cedula" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por cédula" arialabel="Search"/>

    <label for="bs_nombre">Nombre: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_nombre" id="bs_nombre" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por nombre" arialabel="Search"/>

    <label for="bs_apellido">Apellido: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_apellido" id="bs_apellido" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por apellido" arialabel="Search"/>

    <label for="bs_sex">Sexo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_sex" name="bs_sex">
        <option value="" selected>Seleccione un sexo</option>
        <option value="Femenino" selected>Femenino</option>
        <option value="Masculino" selected>Masculino</option>
    </select>

    <label for="bs_ocupacion_laboral">Ocupación Laboral: &nbsp;&nbsp;&nbsp;</label>
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
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
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

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cedula">Cedula</label>
            <input type="number" class="form-control" required id="cedula" name="cedula" />
        </div>

        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="nombre" name="nombre" />
            <input type="hidden" id="nombre2" name="nombre2" />
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="apellido" name="apellido" />
            <input type="hidden" id="apellido2" name="apellido2" />
        </div>

        <div class="form-group col-md-6">
            <label for="sex">Sexo</label>
            <select class="form-control" id="sex" name="sex">
                <option value="null" disabled selected>Seleccione un sexo</option>
                <option value="Femenino" selected>Femenino</option>
                <option value="Masculino" selected>Masculino</option>
            </select>
            <input type="hidden" id="sex2" name="sex2" />
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="telefono">Telefono</label>
            <input type="tel" class="form-control" required id="telefono" name="telefono" />
            <input type="hidden" id="telefono2" name="telefono2" />
        </div>

        <div class="form-group col-md-6">
            <label for="ocupacion_laboral">Ocupación Laboral</label>
            <select class="form-control" id="ocupacion_laboral" name="ocupacion_laboral">
                <option value="null" disabled selected>Seleccione un labor</option>
                @if ($num_ocupacion_laboral>0)
                    @foreach ($ocupacion_laboral as $ocupacion_laboral2)
                        <option value="{{ $ocupacion_laboral2->id }}">{{ $ocupacion_laboral2->labor }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="state">Estado</label>
            <select class="form-control" id="state" name="state">
                <option value="null" disabled selected>Seleccione un estado</option>
                @if ($num_state>0)
                    @foreach ($state as $state2)
                        <option value="{{ $state2->id }}">{{ $state2->states }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="municipality">Municipio</label>
            <select class="form-control" id="municipality" name="municipality">
                <option value="null" disabled selected>Seleccione un municipio</option>
                @if ($num_municipality>0)
                    @foreach ($municipality as $municipality2)
                        <option value="{{ $municipality2->id }}">{{ $municipality2->municipalitys }}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" id="municipality2" name="municipality2" />
        </div>
    </div>

    <div class="form-group">
        <label for="direccion">Dirección</label>
        <textarea class="form-control" required id="direccion" name="direccion"></textarea>
        <input type="hidden" id="direccion2" name="direccion2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
