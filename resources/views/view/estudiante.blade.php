@extends('plantilla.menu')

@include('js.estudiante')

@section('titulo','Estudiante')
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
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
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
    <th scope="col"><center>Fecha de Nacimiento</center></th>
    <th scope="col"><center>Lugar de nacimiento</center></th>
    <th scope="col"><center>Estado</center></th>
    <th scope="col"><center>Municipio</center></th>

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
    <input type="hidden" id="persona" name="persona" />
    <input type="hidden" id="representante" name="representante" />
    <input type="hidden" id="representante2" name="representante2" />
    <input type="text" style='display: none' required id="representante_regis" name="representante_regis" />
    <div id="estudiante">
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
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
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
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="municipality">Municipio</label>
                <select class="form-control" id="municipality" name="municipality">
                    <option value="null" disabled selected>Seleccione un municipio</option>
                </select>
                <input type="hidden" id="municipality2" name="municipality2" />
            </div>

            <div class="form-group col-md-6">
                <label for="direccion">Dirección</label>
                <textarea class="form-control" required id="direccion" name="direccion"></textarea>
                <input type="hidden" id="direccion2" name="direccion2" />
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" class="form-control" required id="fecha_nacimiento" name="fecha_nacimiento" />
                <input type="hidden" id="fecha_nacimiento2" name="fecha_nacimiento2" />
            </div>

            <div class="form-group col-md-6">
                <label for="lugar_nacimiento">Lugar de nacimiento</label>
                <textarea class="form-control" required id="lugar_nacimiento" name="lugar_nacimiento"></textarea>
                <input type="hidden" id="lugar_nacimiento2" name="lugar_nacimiento2" />
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" required id="descripcion" name="descripcion"></textarea>
            <input type="hidden" id="descripcion2" name="descripcion2" />
        </div>
    </div>

    <div style='display: none' id="salud">
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="tipoa">Tipo de alergia</label>
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
                <label for="tipod">Tipo de discapacidad</label>
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
                <label for="alergia">Alergias</label>
                <div class="input-group mb-3">
                    <select class="form-control" id="alergia" name="alergia" aria-describedby="button-addon2">
                        <option value="null" disabled selected>Seleccione una alergia</option>
                    </select>

                    <div data-turbolinks="false" class="input-group-append">

                        <a href="#" onclick = "return alergia();" class="btn btn-success btncolorblanco">
                            <i class="fa fa-search"></i>
                        </a>

                        <a href="#" id="cance" onclick = "return limpiar_a();" class="btn btn-danger btncolorblanco">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="discapacidad">Discapacidad</label>
                <div class="input-group mb-3">
                    <select class="form-control" id="discapacidad" name="discapacidad" aria-describedby="button-addon2">
                        <option value="null" disabled selected>Seleccione una discapacidad</option>
                    </select>

                    <div data-turbolinks="false" class="input-group-append">

                        <a href="#" onclick = "return discapacidad();" class="btn btn-success btncolorblanco">
                            <i class="fa fa-search"></i>
                        </a>

                        <a href="#" onclick = "return limpiar_d();" class="btn btn-danger btncolorblanco">
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
            <label for="cedula_r">Representate</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar por cédula" arialabel="Buscar por cédula" aria-describedby="button-addon2" required id="cedula_r" name="cedula_r" />
                <div  class="input-group-append">
                    <a href="#" id="repre" onclick = "return representante();" class="btn btn-success btncolorblanco">
                        <i class="fa fa-search"></i>
                    </a>

                    <a href="#" style='display: none' id="cance" onclick = "return cancelar();" class="btn btn-danger btncolorblanco">
                        <i class="fa fa-times-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div style='display: none' id="formu">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="nombre_r">Nombre</label>
                    <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="nombre_r" name="nombre_r" />
                </div>

                <div class="form-group col-md-6">
                    <label for="apellido_r">Apellido</label>
                    <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="apellido_r" name="apellido_r" />
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="sex_r">Sexo</label>
                    <select class="form-control" id="sex_r" name="sex_r">
                        <option value="null" disabled selected>Seleccione un sexo</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="telefono_r">Telefono</label>
                    <input type="tel" class="form-control" required id="telefono_r" name="telefono_r" />
                </div>

            </div>

            <div class="form-row">

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

                <div class="form-group col-md-6">
                    <label for="parentesco">Parentesco</label>
                    <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="parentesco" name="parentesco" />
                </div>
                <input type="hidden" id="parentesco2" name="parentesco2" />
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="state_r">Estado</label>
                    <select class="form-control" id="state_r" name="state_r">
                        <option value="null" disabled selected>Seleccione un estado</option>
                        @if ($num_state>0)
                            @foreach ($state as $state2)
                                <option value="{{ $state2->id }}">{{ $state2->states }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="municipality_r">Municipio</label>
                    <select class="form-control" id="municipality_r" name="municipality_r">
                        <option value="null" disabled selected>Seleccione un municipio</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="direccion_r">Dirección</label>
                <textarea class="form-control" required id="direccion_r" name="direccion_r"></textarea>
            </div>
        </div>
    </div>
@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
