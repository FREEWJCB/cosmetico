@extends('plantilla.menu')

@include('plantilla.catalogo')
@include('plantilla.maestro')

@include('js.maestro')

@section('titulo','{{ $titulo }}')

@section('cosmetic','active')

@section('busqueda')

    <label for="bs_atributo">{{$atri}}: &nbsp;&nbsp;&nbsp;</label>
    <input name="bs_atributo" id="bs_atributo" onkeyup="mayuscula(this)" class="form-control mr-sm-2" type="text" placeholder="Buscar por {{$atributo}}" arialabel="Search" />

@endsection

@section('maestro','{{ $maestro }}')
@section('atributo','{{ $atributo }}')
@section('url_ajax',"{{ route('{{ $maestro }}.index') }}")
@section('url_axios',"{{ url('{{ $maestro }}/axios') }}")

@if ($js == 'axios')
    @section('ajax','warning')
    @section('axios','success')
@endif


@section('thead')

    <th scope="col"><center>{{$atri}}</center></th>

@endsection

@section('tbody')

    @if ($num > 0)
        @php($i=0)
        @foreach ($cons as $cons2)
            @php($i++)
            <tr>
                <th scope="row"><center>{{ $num }}</center></th>

            </tr>
        @endforeach
    @else
        <tr><td colspan="3">No hay datos registrados</td></tr>
    @endif

@endsection

@section('form')


    <div class="form-group">
      <label for="atributo">Tipo</label>
      <input type="text" onkeyup="mayuscula(this)" required class="form-control" id="atributo" name="atributo" />
      <input type="hidden" id="atributo2" name="atributo2" />
    </div>


@endsection

@section('contenido')

    @include('plantilla.tabla')

@endsection
