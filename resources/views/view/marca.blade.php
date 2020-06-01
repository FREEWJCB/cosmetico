@extends('plantilla.menu')

@include('js.marcas')

@section('titulo','Marca')
@section('cosmetic','active')

@section('busqueda')

    <label for="bs_marca">Marca: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_marca" id="bs_marca" class="form-control mr-sm-2" type="text" placeholder="Buscar por marca" arialabel="Search" />

@endsection

@section('thead')

    <th scope="col"><center>Marca</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
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
      <label for="marca">Marca</label>
      <input type="text" required class="form-control" id="marca" name="marca" />
      <input type="hidden" id="marca2" name="marca2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
