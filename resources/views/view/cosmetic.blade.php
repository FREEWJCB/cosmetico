@extends('plantilla.menu')

@section('cosmetic','active')

@section('busqueda')

    <label for="bs-tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs-tipo" name="bs-tipo">
      <option value="" selected>Seleccione la tipo</option>
    </select>

    <label for="bs-marca">Marca: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs-marca" name="bs-marca">
      <option value="" selected>Seleccione la marca</option>
    </select>

    <label for="bs-modelo">Modelo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" required id="bs-modelo" name="bs-modelo">
      <option value="" selected>Seleccione la modelo</option>
    </select>

    <label for="bs-cosmetico">Cosmetico: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs-cosmetico" id="bs-cosmetico" class="form-control mr-sm-2" type="search" placeholder="Buscar por cosmetico" arialabel="Search" />

@endsection

@section('thead')

    <th scope="col"><center>Tipo</center></th>
    <th scope="col"><center>Marca</center></th>
    <th scope="col"><center>Modelo</center></th>
    <th scope="col"><center>Cosmetico</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $i }}</center></th>
                <td><center>{{ $cons2->tip }}</center></td>
                <td><center>{{ $cons2->marc }}</center></td>
                <td><center>{{ $cons2->model }}</center></td>
                <td><center>{{ $cons2->cosmetico }}</center></td>
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

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="marca">Marca</label>
        <select class="form-control" required id="marca" name="marca">
          <option value="null" disabled selected>Seleccione la marca</option>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="modelo">Modelo</label>
        <select class="form-control" required id="modelo" name="modelo">
          <option value="null" disabled selected>Seleccione la modelo</option>
        </select>
        <input type="hidden" id="modelo2" name="modelo2" />
      </div>

    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="tipo">Tipo</label>
        <select class="form-control" required id="tipo" name="tipo">
          <option value="null" disabled selected>Seleccione la tipo</option>
        </select>
        <input type="hidden" id="tipo2" name="tipo2" />
      </div>

      <div class="form-group col-md-6">
        <label for="cosmetico">Cosmetico</label>
        <input type="text" class="form-control" required id="cosmetico" name="cosmetico" />
        <input type="hidden" id="cosmetico2" name="cosmetico2" />
      </div>

    </div>

    <div class="form-group">
      <label for="descripcion">Descripción</label>
      <textarea type="text" class="form-control" required id="descripcion" name="descripcion"></textarea>
      <input type="hidden" id="descripcion2" name="descripcion2" />
    </div>

@endsection


@section('script')

    <script src="{{ asset('js/cosmetic.js') }}" crossorigin="anonymous"></script>

@endsection


@section('contenido')

    @include('plantilla.tabla')

@endsection
