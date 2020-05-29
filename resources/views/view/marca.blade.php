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


@section('script')

    <script src="{{ asset('js/marca.js') }}" crossorigin="anonymous"></script>

@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
