@extends('plantilla.menu')

@include('js.empleado')

@section('titulo','Empleado')
@section('proyecto','active')
@section('modal','modal-lg')

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

    <label for="bs_email"><b>Email:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_email" id="bs_email" class="form-control mr-sm-2" type="email" placeholder="Buscar por email" arialabel="Search"/>

    <label for="bs_cargo"><b>Cargo:</b> &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_cargo" name="bs_cargo">
        <option value="" selected>Seleccione un cargo</option>
        @if ($num_cargo>0)
            @foreach ($cargo as $cargo2)
                <option value="{{ $cargo2->id }}">{{ $cargo2->cargos }}</option>
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
    <th scope="col"><center>Email</center></th>
    <th scope="col"><center>Cargo</center></th>

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
                <td><center>{{ $cons2->email }}</center></td>
                <td><center>{{ $cons2->cargos }}</center></td>
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
        
        <div class="form-group col-md-4">
            <label for="cedula"><b>Cedula:</b></label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" maxlength="8" onkeypress="return numero_e(event)" required id="cedula" name="cedula" />
                <div data-turbolinks="false" class="input-group-append">
                    <a href="#" style='display: none' id="cance" onclick = "return cancelar();" class="btn btn-danger btncolorblanco">
                        <i class="fa fa-times-circle"></i>
                    </a>
                </div>
                <small id="cedula_e" style="color: red"></small>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label for="nombre"><b>Nombre:</b></label>
            <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="nombre" name="nombre" />
            <input type="hidden" id="nombre2" name="nombre2" />
            <small id="nombre_e" style="color: red"></small>
        </div>

        <div class="form-group col-md-4">
            <label for="apellido"><b>Apellido:</b></label>
            <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="apellido" name="apellido" />
            <input type="hidden" id="apellido2" name="apellido2" />
            <small id="apellido_e" style="color: red"></small>
        </div>
    </div>

    <div class="form-row">
        
        <div class="form-group col-md-4">
            <label for="sex"><b>Sexo:</b></label>
            <select class="form-control" id="sex" name="sex">
                <option value="null" disabled selected>Seleccione un sexo</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
            </select>
            <input type="hidden" id="sex2" name="sex2" />
            <small id="sex_e" style="color: red"></small>
        </div>

        <div class="form-group col-md-4">
            <label for="telefono"><b>Telefono:</b></label>
            <input type="tel" class="form-control" maxlength="11" required id="telefono" name="telefono" />
            <input type="hidden" id="telefono2" name="telefono2" />
            <small id="telefono_e" style="color: red"></small>
        </div>

        <div class="form-group col-md-4">
            <label for="email"><b>Email:</b></label>
            <input type="email" class="form-control" required id="email" name="email" />
            <input type="hidden" id="email2" name="email2" />
            <small id="email_e" style="color: red"></small>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
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

        <div class="form-group col-md-4">
            <label for="municipality"><b>Municipio:</b></label>
            <select class="form-control" required id="municipality" name="municipality">
                <option value="null" disabled selected>Seleccione un municipio</option>
            </select>
            <input type="hidden" id="municipality2" name="municipality2" />
            <small id="municipality_e" style="color: red"></small>
        </div>

        <div class="form-group col-md-4">
            <label for="cargo"><b>Cargo:</b></label>
            <select class="form-control" required id="cargo" name="cargo">
                <option value="null" disabled selected>Seleccione un cargo</option>
                @if ($num_cargo>0)
                    @foreach ($cargo as $cargo2)
                        <option value="{{ $cargo2->id }}">{{ $cargo2->cargos }}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" id="cargo2" name="cargo2" />
            <small id="cargo_e" style="color: red"></small>
        </div>
        
    </div>

    <div class="form-group">
        <label for="direccion"><b>Dirección:</b></label>
        <textarea class="form-control" required id="direccion" name="direccion" rows="3"></textarea>
        <input type="hidden" id="direccion2" name="direccion2" />
        <small id="direccion_e" style="color: red"></small>
    </div>

@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
