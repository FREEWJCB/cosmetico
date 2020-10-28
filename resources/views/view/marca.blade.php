@extends('plantilla.menu')

@include('js.marcas')

@section('titulo','Marca')
@section('cosmetic','active')

@section('busqueda')

    <label for="bs_marca"><b>Marca:</b> &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_marca" id="bs_marca" onkeyup="mayuscula(this)" maxlength="255" class="form-control mr-sm-2" type="text" placeholder="Buscar por marca" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif

@section('thead')

    <th scope="col"><center>Marca</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php $i=0 @endphp
        @foreach ($cons as $cons2)
            @php $i++ @endphp
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->marca }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="marca"><b>Marca:</b></label>
      <input type="text" required onkeyup="mayuscula(this)" maxlength="255" class="form-control" id="marca" name="marca" />
      <input type="hidden" id="marca2" name="marca2" />
      <small id="marca_e" style="color: red"></small>
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
