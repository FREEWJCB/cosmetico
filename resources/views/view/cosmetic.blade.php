@extends('plantilla.menu')

@section('cosmetic','active')

@section('busqueda')

    <label for="bs_tipo">Tipo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_tipo" name="bs_tipo">
      <option value="" selected>Seleccione la tipo</option>
    </select>

    <label for="bs_marca">Marca: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_marca" name="bs_marca">
      <option value="" selected>Seleccione la marca</option>
    </select>

    <label for="bs_modelo">Modelo: &nbsp;&nbsp;&nbsp;</label>
    <select class="form-control mr-sm-2" id="bs_modelo" name="bs_modelo">
      <option value="" selected>Seleccione la modelo</option>
    </select>

    <label for="bs_cosmetico">Cosmetico: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_cosmetico" id="bs_cosmetico" class="form-control mr-sm-2" type="text" placeholder="Buscar por cosmetico" arialabel="Search" />

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
                @include('plantilla.catalogo')
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
