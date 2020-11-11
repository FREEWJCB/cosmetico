@extends('plantilla.menu')

@include('js.estudiante')

@section('titulo','Estudiante')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_cedula"><b>Cédula:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cedula" id="bs_cedula" class="form-control mr-sm-2" type="number" maxlength="8" placeholder="Buscar por cédula" arialabel="Search"/>

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

@endsection

@section('ventanas')

    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" id="button_estudiante" onclick = "return estudiante();" class="btn btn-secondary">Estudiante</button>
        <button type="button" id="button_salud" onclick = "return salud();" class="btn btn-secondary">Salud</button>
        <button type="button" id="button_representante" onclick = "return representantes();" class="btn btn-secondary">Representante</button>
    </div>

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Cédula</center></th>
    <th scope="col"><center>Nombre y Apellido</center></th>
    <th scope="col"><center>Sexo</center></th>
    <th scope="col"><center>Fecha de Nacimiento</center></th>
    <th scope="col"><center>Lugar de nacimiento</center></th>
    <th scope="col"><center>Estado</center></th>
    <th scope="col"><center>Municipio</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php $i=0; @endphp
        @foreach ($cons as $cons2)
            @php $i++; @endphp
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->cedula }}</center></td>
                <td><center>{{ $cons2->nombre }} {{ $cons2->apellido }}</center></td>
                <td><center>{{ $cons2->sex }}</center></td>
                <td><center>{{ $cons2->fecha_nacimiento }}</center></td>
                <td><center>{{ $cons2->lugar_nacimiento }}</center></td>
                <td><center>{{ $cons2->states }}</center></td>
                <td><center>{{ $cons2->municipalitys }}</center></td>

                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="6">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')
    <input type="hidden" id="ventana" name="ventana" />
    <input type="hidden" id="persona" name="persona" />
    <input type="hidden" id="representante" name="representante" />
    <input type="hidden" id="representante2" name="representante2" />
    <div id="estudiante">
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
                <select class="form-control" id="sex" name="sex">
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
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="municipality"><b>Municipio:</b></label>
                <select class="form-control" required id="municipality" name="municipality">
                    <option value="null" disabled selected>Seleccione un municipio</option>
                </select>
                <input type="hidden" id="municipality2" name="municipality2" />
                <small id="municipality_e" style="color: red"></small>
            </div>

            <div class="form-group col-md-6">
                <label for="direccion"><b>Dirección:</b></label>
                <textarea class="form-control" required id="direccion" name="direccion"></textarea>
                <input type="hidden" id="direccion2" name="direccion2" />
                <small id="direccion_e" style="color: red"></small>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="fecha_nacimiento"><b>Fecha de nacimiento:</b></label>
                <input type="date" class="form-control" required id="fecha_nacimiento" name="fecha_nacimiento" />
                <input type="hidden" id="fecha_nacimiento2" name="fecha_nacimiento2" />
                <small id="fecha_nacimiento_e" style="color: red"></small>
            </div>

            <div class="form-group col-md-6">
                <label for="lugar_nacimiento"><b>Lugar de nacimiento:</b></label>
                <textarea class="form-control" required id="lugar_nacimiento" name="lugar_nacimiento"></textarea>
                <input type="hidden" id="lugar_nacimiento2" name="lugar_nacimiento2" />
                <small id="lugar_nacimiento_e" style="color: red"></small>
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion"><b>Descripción:</b></label>
            <textarea class="form-control" required id="descripcion" name="descripcion"></textarea>
            <input type="hidden" id="descripcion2" name="descripcion2" />
            <small id="descripcion_e" style="color: red"></small>
        </div>
    </div>

    <div style='display: none' id="salud">
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="tipoa"><b>Tipo de alergia:</b></label>
                <select class="form-control" id="tipoa" name="tipoa">
                    <option value="null" disabled selected>Seleccione un tipo</option>
                    @if ($num_tipoa>0)
                        @foreach ($tipoa as $tipoa2)
                            <option value="{{ $tipoa2->id }}">{{ $tipoa2->tipo }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="tipod"><b>Tipo de discapacidad:</b></label>
                <select class="form-control" id="tipod" name="tipod">
                    <option value="null" disabled selected>Seleccione un tipo</option>
                    @if ($num_tipod>0)
                        @foreach ($tipod as $tipod2)
                            <option value="{{ $tipod2->id }}">{{ $tipod2->tipo }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="alergia"><b>Alergias:</b></label>
                <div class="input-group mb-3">
                    <select class="form-control" id="alergia" name="alergia" aria-describedby="button-addon2">
                        <option value="null" disabled selected>Seleccione una alergia</option>
                    </select>

                    <div data-turbolinks="false" class="input-group-append">

                        <a href="#" onclick = "return alergia();" class="btn btn-success btncolorblanco">
                            <i class="fa fa-plus"></i>
                        </a>

                        <a href="#" style='display: none' id="clear_a" onclick = "return clear_a();" class="btn btn-danger btncolorblanco">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="discapacidad"><b>Discapacidad:</b></label>
                <div class="input-group mb-3">
                    <select class="form-control" id="discapacidad" name="discapacidad" aria-describedby="button-addon2">
                        <option value="null" disabled selected>Seleccione una discapacidad</option>
                    </select>

                    <div data-turbolinks="false" class="input-group-append">

                        <a href="#" onclick = "return discapacidad();" class="btn btn-success btncolorblanco">
                            <i class="fa fa-plus"></i>
                        </a>

                        <a href="#" style='display: none' id="clear_d" onclick = "return clear_d();" class="btn btn-danger btncolorblanco">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div id="list_a"></div>
            </div>

            <div class="form-group col-md-6">
                <div id="list_d"></div>
            </div>
        </div>
    </div>

    <div style='display: none' id="representant">
        <div class="form-group">
            <label for="cedula_r"><b>Representate:</b></label>
            <div class="input-group mb-3">
                <input type="number" maxlength="8" class="form-control" placeholder="Buscar por cédula" arialabel="Buscar por cédula" aria-describedby="button-addon2" required id="cedula_r" name="cedula_r" />
                <div  data-turbolinks="false" class="input-group-append">
                    <a href="#" id="repre" onclick = "return representante();" class="btn btn-success btncolorblanco">
                        <i class="fa fa-search"></i>
                    </a>

                    <a href="#" style='display: none' id="cance" onclick = "return cancelar();" class="btn btn-danger btncolorblanco">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <small id="cedula_r_e" style="color: red"></small>
                </div>
            </div>
        </div>
        <div style='display: none' id="formu">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="nombre_r"><b>Nombre:</b></label>
                    <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="nombre_r" name="nombre_r" />
                    <small id="nombre_r_e" style="color: red"></small>
                </div>

                <div class="form-group col-md-6">
                    <label for="apellido_r"><b>Apellido:</b></label>
                    <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="apellido_r" name="apellido_r" />
                    <small id="apellido_r_e" style="color: red"></small>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="sex_r"><b>Sexo:</b></label>
                    <select class="form-control" id="sex_r" name="sex_r">
                        <option value="null" disabled selected>Seleccione un sexo</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                    <small id="sex_r_e" style="color: red"></small>
                </div>

                <div class="form-group col-md-6">
                    <label for="telefono_r"><b>Telefono:</b></label>
                    <input type="tel" class="form-control" maxlength="11" required id="telefono_r" name="telefono_r" />
                    <small id="telefono_r_e" style="color: red"></small>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="ocupacion_laboral"><b>Ocupación Laboral:</b></label>
                    <select class="form-control" id="ocupacion_laboral" name="ocupacion_laboral">
                        <option value="null" disabled selected>Seleccione un labor</option>
                        @if ($num_ocupacion_laboral>0)
                            @foreach ($ocupacion_laboral as $ocupacion_laboral2)
                                <option value="{{ $ocupacion_laboral2->id }}">{{ $ocupacion_laboral2->labor }}</option>
                            @endforeach
                        @endif
                    </select>
                    <small id="ocupacion_laboral_e" style="color: red"></small>
                </div>

                <div class="form-group col-md-6">
                    <label for="parentesco"><b>Parentesco:</b></label>
                    <input type="text" class="form-control" onkeyup="mayuscula(this)" onkeypress="return letra(event)" maxlength="255" required id="parentesco" name="parentesco" />
                </div>
                <input type="hidden" id="parentesco2" name="parentesco2" />
                <small id="parentesco_e" style="color: red"></small>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="state_r"><b>Estado:</b></label>
                    <select class="form-control" id="state_r" name="state_r">
                        <option value="null" disabled selected>Seleccione un estado</option>
                        @if ($num_state>0)
                            @foreach ($state as $state2)
                                <option value="{{ $state2->id }}">{{ $state2->states }}</option>
                            @endforeach
                        @endif
                    </select>
                    <small id="state_r_e" style="color: red"></small>
                </div>

                <div class="form-group col-md-6">
                    <label for="municipality_r"><b>Municipio:</b></label>
                    <select class="form-control" id="municipality_r" name="municipality_r">
                        <option value="null" disabled selected>Seleccione un municipio</option>
                    </select>
                    <small id="municipality_r_e" style="color: red"></small>
                </div>
            </div>

            <div class="form-group">
                <label for="direccion_r"><b>Dirección:</b></label>
                <textarea class="form-control" required id="direccion_r" name="direccion_r"></textarea>
                <small id="direccion_r_e" style="color: red"></small>
            </div>
        </div>
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
