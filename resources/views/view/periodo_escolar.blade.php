@extends('plantilla.menu')

@include('js.periodo_escolar')

@section('titulo','Periodo Escolar')

@section('proyecto','active')

@section('busqueda')

    <label for="bs_cedula">Cédula: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cedula" id="bs_cedula" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por cédula" arialabel="Search"/>

    <label for="bs_nombre">Nombre: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_nombre" id="bs_nombre" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por nombre" arialabel="Search"/>

    <label for="bs_apellido">Apellido: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_apellido" id="bs_apellido" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por apellido" arialabel="Search"/>

    <label for="bs_grado">Grado: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_grado" name="bs_grado">
        <option value="" selected>Seleccione un grado</option>
        @if ($num_grado>0)
            @foreach ($grado as $grado2)
                <option value="{{ $grado2->id }}">{{ $grado2->grados }}</option>
            @endforeach
        @endif
    </select>

    <label for="bs_seccion">Sección: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_seccion" name="bs_seccion">
        <option value="" selected>Seleccione una seccion</option>
        @if ($num_seccion>0)
            @foreach ($seccion as $seccion2)
                <option value="{{ $seccion2->id }}">{{ $seccion2->secciones }}</option>
            @endforeach
        @endif
    </select>

    <label for="bs_salon">Salón: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_salon" name="bs_salon">
        <option value="" selected>Seleccione una salón</option>
        @if ($num_salon>0)
            @foreach ($salon as $salon2)
                <option value="{{ $salon2->id }}">{{ $salon2->salones }}</option>
            @endforeach
        @endif
    </select>

    <label for="bs_ano">Año: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_ano" id="bs_ano" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por año" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead2')
    <tr>
        <th scope="col" colspan="3"><center>Profesor</center></th>
        <th scope="col" colspan="5"><center>Periodo Escolar</center></th>
    </tr>
@endsection
@section('thead')

    <th scope="col"><center>Cédula</center></th>
    <th scope="col"><center>Nombre y apellido</center></th>
    <th scope="col"><center>Grado</center></th>
    <th scope="col"><center>Sección</center></th>
    <th scope="col"><center>Salón</center></th>
    <th scope="col"><center>Año</center></th>

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
                <td><center>{{ $cons2->grados }}</center></td>
                <td><center>{{ $cons2->secciones }}</center></td>
                <td><center>{{ $cons2->salones }}</center></td>
                <td><center>{{ $cons2->ano }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="8">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')
    <input type="text" style='display: none' required id="empleado" name="empleado" />
    <input type="hidden" id="empleado2" name="empleado2" />
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="grado">Grado</label>
            <select class="form-control" required id="grado" name="grado">
                <option value="null" disabled selected>Seleccione el grado</option>
                @if ($num_grado>0)
                @foreach ($grado as $grado2)
                    <option value="{{ $grado2->id }}">{{ $grado2->grados }}</option>
                @endforeach
                @endif
            </select>
            <input type="hidden" id="grado2" name="grado2" />
        </div>

        <div class="form-group col-md-6">
            <label for="seccion">Sección</label>
            <select class="form-control" required id="seccion" name="seccion">
                <option value="null" disabled selected>Seleccione la sección</option>
                @if ($num_seccion>0)
                @foreach ($seccion as $seccion2)
                    <option value="{{ $seccion2->id }}">{{ $seccion2->secciones }}</option>
                @endforeach
                @endif
            </select>
            <input type="hidden" id="seccion2" name="seccion2" />
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="salon">Salón</label>
            <select class="form-control" required id="salon" name="salon">
                <option value="null" disabled selected>Seleccione el Salón</option>
                @if ($num_salon>0)
                @foreach ($salon as $salon2)
                    <option value="{{ $salon2->id }}">{{ $salon2->salones }}</option>
                @endforeach
                @endif
            </select>
            <input type="hidden" id="salon2" name="salon2" />
        </div>

        <div class="form-group col-md-6">
            <label for="ano">Año</label>
            <input type="text" class="form-control" required id="ano" name="ano" />
            <input type="hidden" id="ano2" name="ano2" />
        </div>
    </div>

    <div class="form-group">
        <label for="cedula">Profesor</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar por cédula" arialabel="Buscar por cédula" aria-describedby="button-addon2" required id="cedula" name="cedula" />
            <div  class="input-group-append">
                <a href="#" onclick = "return empleado();" class="btn btn-success btncolorblanco">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>

    </div>

    <div style='display: none' id="profesor" class="form-group">
        <label for="nombre">Nombre y apellido</label>
        <input type="text" class="form-control" disabled id="nombre" name="nombre" />
    </div>

    <div style='display: none' id="noprofesor" class="form-group">
        <div class="alert alert-danger" role="alert">
            <center>
                ¡La cédula introducida no existe! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{route('Empleado.index')}}" class="btn btn-danger btncolorblanco" target="_blank" rel="noopener noreferrer"><i class="fa fa-user-plus"></i> Registrar</a>
            </center>
        </div>
    </div>
@endsection

@section('contenido')

    @include('plantilla.tabla')


@endsection
