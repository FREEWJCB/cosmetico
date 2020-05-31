@extends('plantilla.menu')

@section('titulo','Tipo')
@section('cosmetic','active')

@section('busqueda')

    <label for="bs-tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
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
                <td>
                    <center>
                        <a onclick = "return mostrar({{ $cons2->id }},'Mostrar');" class="btn btn-info btncolorblanco" href="#" >
                            <i class="fa fa-list-alt"></i>
                        </a>
                        <a onclick = "return mostrar({{ $cons2->id }},'Edicion');" class="btn btn-success btncolorblanco" href="#" >
                            <i class="fa fa-edit"></i>
                        </a>
                        <a onclick = "return desactivar({{ $cons2->id }});" class="btn btn-danger btncolorblanco" href="#" >
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
      <label for="tipo">Tipo</label>
      <input type="text" required class="form-control" id="tipo" name="tipo" />
      <input type="hidden" id="tipo2" name="tipo2" />
    </div>


@endsection

@section('document')
    $("#bs_tipo").on("keyup", function() {
        cargar("{{route('Tipo.cargar')}}");
    });
@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
