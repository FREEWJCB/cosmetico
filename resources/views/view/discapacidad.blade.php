@extends('plantilla.menu')

@include('js.discapacidad')

@section('titulo','Discapacidad')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs_tipo" name="bs_tipo">
      <option class="form-control mr-sm-2" value="" selected>Seleccione el tipo</option>
      @if ($num_tipo>0)
        @foreach ($tipo_discapacidad as $tipo_discapacidad2)
            <option value="{{ $tipo_discapacidad2->id }}">{{ $tipo_discapacidad2->tipo }}</option>
        @endforeach
      @endif

    </select>

    <label for="bs_discapacidades">Discapacidad: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_discapacidades" id="bs_discapacidades" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por discapacidades" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Tipo</center></th>
    <th scope="col"><center>Discapacidad</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->tip }}</center></td>
                <td><center>{{ $cons2->discapacidades }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="4">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tipo">Tipo</label>
            <select class="form-control" required id="tipo" name="tipo">
                <option value="null" disabled selected>Seleccione el tipo</option>
                @if ($num_tipo>0)
                    @foreach ($tipo_discapacidad as $tipo_discapacidad2)
                        <option value="{{ $tipo_discapacidad2->id }}">{{ $tipo_discapacidad2->tipo }}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" id="tipo2" name="tipo2" />
        </div>

        <div class="form-group col-md-6">
            <label for="discapacidades">Discapacidad</label>
            <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="discapacidades" name="discapacidades" />
            <input type="hidden" id="discapacidades2" name="discapacidades2" />
        </div>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea type="text" class="form-control" required id="descripcion" name="descripcion"></textarea>
        <input type="hidden" id="descripcion2" name="descripcion2" />
    </div>

@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
