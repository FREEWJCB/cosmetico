@extends('plantilla.menu')

@include('js.salon')

@section('titulo','Salon')
@section('proyecto','active')

@section('busqueda')

    <label for="bs_salones">Salon: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_salones" id="bs_salones" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por salon" arialabel="Search" />

@endsection

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>Salon</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->salones }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="salones">Salon</label>
      <input type="text" onkeyup="mayuscula(this)" required class="form-control" id="salones" name="salones" />
      <input type="hidden" id="salones2" name="salones2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
