@extends('plantilla.menu')

@section('titulo','Marca')
@section('cosmetic','active')

@section('busqueda')

    <label for="bs-dato">Marca: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-dato" id="bs-dato" class="form-control mr-sm-2" type="search" placeholder="Buscar por marca" arialabel="Search" />

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
                <td>
                <center>
                    <a href="#" onclick = "return mostrar({{ $cons2->id }},'Mostrar');" class="btn btn-info btncolorblanco">
                        <i class="fa fa-list-alt"></i>
                    </a>
                    <a href="#" onclick = "return mostrar({{ $cons2->id }},'Edicion');" class="btn btn-success btncolorblanco">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" onclick = "return desactivar({{ $cons2->id }});" class="btn btn-danger btncolorblanco">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </center>
                </td>
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

@section('script')

    <script src="{{ asset('js/marca.js') }}" crossorigin="anonymous"></script>

@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
