@extends('plantilla.menu')

@include('js.tipos')

@section('titulo','Tipo')
@section('cosmetic','active')

@section('busqueda')

    <label for="bs_tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_tipo" id="bs_tipo" class="form-control mr-sm-2" type="text" placeholder="Buscar por tipo" arialabel="Search" />

@endsection

@section('thead')

    <th scope="col"><center>Tipo</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->tipo }}</center></td>
                @include('plantilla.catalogo')
            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="tipo">Tipo</label>
      <input type="text" required class="form-control" id="tipo" name="tipo" />
      <input type="hidden" id="tipo2" name="tipo2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
