@section('document')

    $("#bs_preguntas").on("keyup", function() {
        cargar();
    });

@endsection

@section('select')

    $('#respu').show();
    clear();

@endsection

@section('url_registro') var url = "{{ route('Pregunta.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Pregunta.update') }}"; @endsection

@section('registro') $('#preguntas').val(''); $('#resp_num').val(''); clear(); @endsection

@section('edicion') $('#preguntas2').val($('#preguntas').val()); @endsection

@section('delete') url: "{{url('Pregunta')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Pregunta.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Pregunta.mostrar')}}", @endsection

@section('rellenar')

    $("#preguntas").val(valores.preguntas);
    $("#preguntas2").val(valores.preguntas);

@endsection

@section('editar') $("#preguntas").removeAttr("readonly"); @endsection

@section('mostrar') $("#preguntas").attr("readonly", "readonly"); @endsection

@section('funciones')

    function clear() {
        $.ajax({
            type: "POST",
            url:"{{route('Pregunta.clear')}}",
            success: function(valores) {
                $('#resp').html('');
                $('#resp_num').val('');
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function agregar() {
        var respuestas = $('#respuestas').val();
        $.ajax({
            type: "POST",
            url:"{{route('Pregunta.respuestas')}}",
            data: "respuestas="+respuestas,
            success: function(valores) {
                $('#resp').html(valores.respuestas);
                if(valores.num > 0){
                    $('#resp_num').val('1');
                }else{
                    $('#resp_num').val('');
                }
                $('#resp'+valores.id).slideDown();
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function quitar(id) {
        $.ajax({
            type: "POST",
            url:"{{route('Pregunta.quitar')}}",
            data: "id="+id,
            success: function(valores) {
                if(valores.num > 0){
                    $('#resp_num').val('1');
                }else{
                    $('#resp_num').val('');
                }
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function prueba() {
        $.ajax({
            type: "POST",
            url:"{{route('Pregunta.calcular')}}",
            data: $("#formulario").serialize(),
            success: function(valores) {
                $('#resp').html(valores.resp);
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

@endsection
