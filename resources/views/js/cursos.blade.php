{{-- <script> --}}
@section('document')

    $("#lim").on("click", function() {
        limpiar();
    });

    $("#bs_curso").on("keyup", function() {
        cargar();
    });

    $("#curso").on("keyup", function() {
        val_curso(1);
    });

    $("#basico_f").on("keyup", function() {

        basico();
        val_curso(1);
    });

    $("#intermedio_f").on("keyup", function() {

        intermedio();
        val_curso(1);
    });

    $("#avanzado_f").on("keyup", function() {

        avanzado();
        val_curso(1);
    });

    $("#basico_f").on("change", function() {

        basico();
        val_curso(1);
    });

    $("#intermedio_f").on("change", function() {

        intermedio();
        val_curso(1);
    });

    $("#avanzado_f").on("change", function() {

        avanzado();
        val_curso(1);
    });

@endsection

@section('url_registro') url = "{{ route('Curso.store') }}"; @endsection

@section('url_edicion') url = `{{url('Curso')}}/${id}`; @endsection

@section('select') limpiar(); @endsection

@section('registro') limpiar(); @endsection

@section('edicion') $('#curso2').val($('#curso').val()); @endsection

@section('delete') url: `{{url('Curso')}}/${id}`, @endsection

@section('cargar') url: "{{route('Curso.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Curso.mostrar')}}", @endsection

@section('rellenar')

    $("#curso").val(valores.curso);
    $("#curso2").val(valores.curso);

@endsection

@section('editar') $("#curso").removeAttr("readonly"); @endsection

@section('mostrar') $("#curso").attr("readonly", "readonly"); @endsection

@section('funciones')
    function basico(){

        let basico = parseInt($('#basico_f').val());
        let intermedio = parseInt($('#intermedio_f').val());
        let intermedio_i = basico+1;
        if (basico != "") {
            $("#intermedio_i").html(intermedio_i);
            $("#intermedio_f").attr("min", intermedio_i);

            if (basico >= intermedio) {
                $("#intermedio_f").val(intermedio_i);
            }
        }


    }

    function intermedio(){


        let intermedio = parseInt($('#intermedio_f').val());
        let avanzado = parseInt($('#avanzado_f').val());
        let avanzado_i = intermedio+1;

        if (intermedio != "") {
            $("#avanzado_i").html(avanzado_i);
            $("#avanzado_f").attr("min", avanzado_i);

            if (intermedio >= avanzado) {
                $("#avanzado_f").val(avanzado_i);
            }
        }


    }

    function avanzado(){


        let avanzado = parseInt($('#avanzado_f').val());
        let profesional = parseInt($('#profesional_f').val());
        let profesional_i = avanzado+1;

        if (avanzado != "") {
            $("#profesional_i").html(profesional_i);
            $("#profesional_f").attr("min", profesional_i);

            if (avanzado >= profesional) {
                $("#profesional_f").val(profesional_i);
            }
        }


    }

    function curso() {
        $("#button_curso").attr("class", "btn btn-success");
        $("#button_pregunta").attr("class", "btn btn-secondary");
        $('#pregunta_ventana').fadeOut();
        $('#curso_ventana').fadeIn();
        $("#anterior").attr("class", "btn btn-secondary");
        $("#anterior").attr("disabled", "disabled");
        $("#siguiente").attr("class", "btn btn-primary");
        $("#siguiente").removeAttr("disabled");
        $("#ventana").val('1');
        val_curso(0);
    }

    function val_curso(val){
        let ventana = $('#ventana').val();
        let curso = $('#curso').val();
        let basico = parseInt($('#basico_f').val());
        let intermedio = parseInt($('#intermedio_f').val());
        let avanzado = parseInt($('#avanzado_f').val());
        let profesional = parseInt($('#profesional_f').val());
        let intermedio_i = basico+1;
        let avanzado_i = intermedio+1;
        let profesional_i = avanzado+1;

        let i = 0;

        // curso
        if (curso == "") {
            i++;
            // console.log('curso'+i);
        }else if (curso.length <= 3){
            i++;
            if (val == 0) {
                $('#curso').val('');
            }
            // console.log();
        }
        // basico
        if (basico == "") {
            i++;
            // console.log('basico'+i);
        }else if (basico < 1){
            i++;
            if (val == 0) {
                $('#basico_f').val(1);
            }
            console.log('curso'+i);
        // }else if (basico > 100){
            i++;
            if (val == 0) {
                $('#basico_f').val(1);
            }
            // console.log('basico'+i);
        }
        // intermedio
        if (intermedio == "") {
            i++;
            // console.log('intermedio'+i);
        }else if (intermedio < intermedio_i){
            i++;
            if (val == 0) {
                $('#intermedio_f').val(intermedio_i);
            }
            // console.log('intermedio'+i);
        }else if (intermedio > 100){
            i++;
            if (val == 0) {
                $('#intermedio_f').val(intermedio_i);
            }
            // console.log('intermedio'+i);
        }
        // avanzado
        if (avanzado == "") {
            i++;
            // console.log('avanzado'+i);
        }else if (avanzado < avanzado_i){
            i++;
            if (val == 0) {
                $('#avanzado_f').val(avanzado_i);
            }
            // console.log('avanzado'+i);
        }else if (avanzado > 100){
            i++;
            if (val == 0) {
                $('#avanzado_f').val(avanzado_i);
            }
            // console.log('avanzado'+i);
        }
        // profesional
        if (profesional == "") {
            i++;
            // console.log('profesional'+i);
        }else if (profesional < profesional_i){
            i++;
            if (val == 0) {
                $('#profesional_f').val(profesional_i);
            }
            // console.log('profesional'+i);
        }else if (profesional > 100){
            i++;
            if (val == 0) {
                $('#profesional_f').val(profesional_i);
            }
            // console.log('profesional'+i);
        }

        if(i > 0){
            $("#anterior").attr("class", "btn btn-secondary");
            $("#anterior").attr("disabled", "disabled");
            $("#siguiente").attr("class", "btn btn-secondary");
            $("#siguiente").attr("disabled", "disabled");
            $("#button_curso").attr("class", "btn btn-success");
            $("#button_pregunta").attr("class", "btn btn-secondary");
            $("#button_pregunta").attr("disabled", "disabled");
            $('#pregunta_ventana').fadeOut();
            $('#curso_ventana').fadeIn();
            $("#ventana").val('1');
        }else{
            if(ventana == 1){
                $("#button_curso").attr("class", "btn btn-success");
                $("#siguiente").attr("class", "btn btn-primary");
                $("#siguiente").removeAttr("disabled");
                $("#button_pregunta").attr("class", "btn btn-primary");
                $("#button_pregunta").removeAttr("disabled");

            }
        }

    }

    function pregunta() {
        $("#button_curso").attr("class", "btn btn-primary");
        $("#button_pregunta").attr("class", "btn btn-success");
        $('#curso_ventana').fadeOut();
        $('#pregunta_ventana').fadeIn();
        $("#anterior").attr("class", "btn btn-primary");
        $("#anterior").removeAttr("disabled");
        $("#siguiente").attr("class", "btn btn-secondary");
        $("#siguiente").attr("disabled", "disabled");
        $("#ventana").val('2');
        val_curso(0);
    }

    function ante() {
        var ventana = $('#ventana').val();

        if (ventana == 2) {

            curso();

        }

    }

    function sigui() {
        var ventana = $('#ventana').val();

        if (ventana == 1) {

            pregunta();

        }

    }

    function puntos(id,id_r) {

        let puntos = new String($(`#puntos${id}${id_r}`).val());
        if (puntos != "") {
            $.ajax({
                type: "POST",
                url:"{{route('Curso.puntos')}}",
                data: `id=${id_r}&puntos=${puntos}`,
                error: function(xhr, textStatus, errorMessage) {
                    error(xhr, textStatus, errorMessage);
                }
            });
        }
        return false;
    }


    function agreg_pre() {
        $.ajax({
            type: "POST",
            url:"{{route('Curso.agreg_pre')}}",
            data: $("#formulario").serialize(),
            success: function(valores) {

                $('#preguntas').val('');
                $('#pregunta_r').html(valores.pregunta);
                if(valores.num > 0){
                    $('#preg_num').val('1');
                }else{
                    $('#preg_num').val('');
                }
                $('#preg'+valores.id).slideDown();
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function agreg_resp(id) {
        $.ajax({
            type: "POST",
            url:"{{route('Curso.agreg_resp')}}",
            data: $("#formulario").serialize()+'&id='+id,
            success: function(valores) {
                // console.log(valores.respuesta);
                $('#respuestas'+id).val('');
                $('#respuesta_r'+id).html(valores.respuesta);
                if(valores.num > 0){
                    $('#resp_num'+id).val('1');
                }else{
                    $('#resp_num'+id).val('');
                }
                $('#resp'+id+valores.id).slideDown();
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function quitar_p(id){
        $.ajax({
            type: "POST",
            url:"{{route('Curso.quitar_p')}}",
            data: "id="+id,
            success: function(valores) {
                if(valores.num > 0){
                    $('#preg_num').val('1');
                }else{
                    $('#preg_num').val('');
                }
                $('#preg'+id).slideUp();
                $('#preg'+id).html('');
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function quitar_r(id,id_r){
        $.ajax({
            type: "POST",
            url:"{{route('Curso.quitar_r')}}",
            data: "id="+id+"&id_r="+id_r,
            success: function(valores) {
                if(valores.num > 0){
                    $('#resp_num'+id).val('1');
                }else{
                    $('#resp_num'+id).val('');
                }
                $('#resp'+id+id_r).slideUp();
                $('#resp'+id+id_r).html('');
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function clear_p(){
        $.ajax({
            type: "POST",
            url:"{{route('Curso.clear_p')}}",
            success: function(valores) {
                $('#pregunta_r').slideUp();
                $('#pregunta_r').html('');
                $('#preg_num').val(0);
                $('#pregunta_r').slideDown();
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function clear_r(id){
        $.ajax({
            type: "POST",
            url:"{{route('Curso.clear_r')}}",
            data: "id="+id,
            success: function(valores) {
                $('#respuesta_r'+id).slideUp();
                $('#respuesta_r'+id).html('');
                $('#resp_num'+id).val(0);
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function limpiar(){
        curso();
        clear_p();
        $('#intermedio_i').html(1);
        $('#avanzado_i').html(1);
        $('#profesional_i').html(1);
        $("#intermedio_f").attr("min", 1);
        $("#avanzado_f").attr("min", 1);
        $("#profesional_f").attr("min", 1);
    }


@endsection

