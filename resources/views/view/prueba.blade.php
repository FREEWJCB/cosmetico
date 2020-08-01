@extends('plantilla.menu')

@include('js.pregunta')
@section('titulo','Prueba')
@section('pregunta','active')
<?php use Illuminate\Support\Facades\DB;?>
@section('contenido')
    <center>
        <div class="container">
            <h1>Preguntas</h1>
            <form id="formulario" name="formulario" class="formulario"  onsubmit='return prueba();'>
                @csrf
                @if ($num > 0)
                    @php($i = 0)
                    @foreach ($cons as $cons2)
                        @php($i++)
                        @php($preguntas=$cons2->preguntas)
                        @php($id=$cons2->id)
                        <div class='form-group'>
                            <br><br> <label>{{ $preguntas }}</label> <br><br>
                            @php($consu = DB::table('respuesta')->where('pregunta', $id)->orderBy('respuestas','asc')->get())
                            @php($u = 0)
                            @foreach ($consu as $consu2)

                                @php($u++)
                                @php($respuestas=$consu2->respuestas)
                                @php($puntos=$consu2->puntos)
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='respuestas{{$i}}' id='respuestas{{$u.$i}}' value='{{$puntos}}'>
                                    <label class='form-check-label' for='respuestas{{$u.$i}}'>{{$respuestas}}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <input type="hidden" name="num" id="num" value="{{$num}}">
                    <br><br><input type='submit' class='btn btn-primary' id='reg' value='Examinar' />
                @else
                    <div class='alert alert-danger' role='alert'>
                        No hay preguntas registradas!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='{{route('Pregunta.index')}}' class='btn btn-danger btncolorblanco' rel='noopener noreferrer'><i class='fa fa-user-plus'></i> Registrar</a>
                    </div>
                @endif
                <div id="resp"></div>
            </form>
        </div>
    </center>
@endsection


