@extends('plantilla.menu')

@include('js.grado')

@section('titulo','Grado')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_grados"><b>Grado:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_grados" id="bs_grados" onkeyup="mayuscula(this)" onkeypress="return numero_e(event)" maxlength="2" class="form-control mr-sm-2" type="text" placeholder="Buscar por grado" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>Grado</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php $i=0 @endphp
        @foreach ($cons as $cons2)
            @php $i++ @endphp
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->grados }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="grados"><b>Grado:</b></label>
      <input type="text" onkeyup="mayuscula(this)" maxlength="2" onkeypress="return numero_e(event)" required class="form-control" id="grados" name="grados" />
      <input type="hidden" id="grados2" name="grados2" />
      <small id="grados_e" style="color: red"></small>
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
