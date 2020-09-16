@extends('plantilla.menu')
@include('js.pregunta')
@section('titulo','Prueba')
@section('pregunta','active')
@section('contenido')
    <center>
        <h1>Prueba</h1>
        <form id="formulario" name="formulario" class="formulario"  onsubmit='return prueba();'>
            <input type='hidden' name='num' id='num' value='0'>
            <div class="form-group">
                <label for="curso">Example select</label>
                <select class="form-control" required id="curso" name="curso">
                    <option value="null" disabled selected>Seleccione el curso</option>
                    @if ($num>0)
                        @foreach ($cons as $cons2)
                            <option value="{{ $cons2->id }}">{{ $cons2->curso }}</option>
                        @endforeach
                    @endif
                </select>
                <button type="button" id="prueba" class="btn btn-primary mb-2">Prueba</button>
            </div>
            <div id="exam"></div>
            <div id="resp"></div>
        </form>
    </center>
@endsection


