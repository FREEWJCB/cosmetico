@extends('plantilla.menu')

@include('js.alergia')

@section('titulo','Alergia')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs_tipo" name="bs_tipo">
      <option class="form-control mr-sm-2" value="" selected>Seleccione el tipo</option>
      @if ($num_tipo>0)
        @foreach ($tipo_alergia as $tipo_alergia2)
            <option value="{{ $tipo_alergia2->id }}">{{ $tipo_alergia2->tipo }}</option>
        @endforeach
      @endif

    </select>

    <label for="bs_alergias">Alergia: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_alergias" id="bs_alergias" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por alergias" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Tipo</center></th>
    <th scope="col"><center>Alergia</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->tip }}</center></td>
                <td><center>{{ $cons2->alergias }}</center></td>
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
                    @foreach ($tipo_alergia as $tipo_alergia2)
                        <option value="{{ $tipo_alergia2->id }}">{{ $tipo_alergia2->tipo }}</option>
                    @endforeach
                @endif
            </select>
            <input type="hidden" id="tipo2" name="tipo2" />
        </div>

        <div class="form-group col-md-6">
            <label for="alergias">Alergia</label>
            <input type="text" class="form-control" onkeyup="mayuscula(this)" required id="alergias" name="alergias" />
            <input type="hidden" id="alergias2" name="alergias2" />
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
