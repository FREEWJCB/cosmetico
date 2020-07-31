@extends('plantilla.menu')

@include('js.pregunta')
@section('titulo','Prueba')
@section('pregunta','active')

@section('contenido')

    <div class="container">
        <h1>Preguntas</h1>

        <form id="formulario" name="formulario" class="formulario"  onsubmit='return prueba();'>
            @if ($num > 0)
                @php($i=0)
                @foreach ($cons as $cons2)
                    @php($i++)
                    @php($preguntas=$cons2->preguntas)
                    @php($id=$cons2->id)
                    <label>{{ $preguntas }}</label>
                    <script>cargar_resp({{$id}});</script>
                    <div id="respu{{$id}}">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Default radio
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                              Second default radio
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                            <label class="form-check-label" for="exampleRadios3">
                              Disabled radio
                            </label>
                          </div>
                          <div class="form-group">
                            <input type="submit" id="" class="btn btn-success btn-submit">Submit</input>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-danger" role="alert">
                    No hay preguntas registradas!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{route('Pregunta.index')}}" class="btn btn-danger btncolorblanco" rel="noopener noreferrer"><i class="fa fa-user-plus"></i> Registrar</a>
                </div>
            @endif


            <div id="resp"></div>
        </form>
    </div>
@endsection


