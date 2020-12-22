{{-- <script> --}}
@section('document')

    $("#lim").on("click", function() {
        limpiar();
    });

    $("#bs_curso").on("keyup", function() {
        cargar();
    });

    $("#curso").on("keyup", function() {
        val_curso("no");
    });

    $("#basico_f").on("keyup", function() {

        basico();
        val_curso("no");
    });

    $("#intermedio_f").on("keyup", function() {

        intermedio();
        val_curso("no");
    });

    $("#avanzado_f").on("keyup", function() {

        avanzado();
        val_curso("no");
    });

    $("#basico_f").on("change", function() {

        basico();
        val_curso("no");
    });

    $("#intermedio_f").on("change", function() {

        intermedio();
        val_curso("no");
    });

    $("#avanzado_f").on("change", function() {

        avanzado();
        val_curso("no");
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

    function validacion_curso(val){
        let boo = true;
        let message = ['validar'];
        let pro = $("#pro").val();
        let curso = $("#curso").val(); let curso2 = $("#curso2").val();
        let basico_f = $("#basico_f").val(); let basico_f2 = $("#basico_f2").val();
        let intermedio_f = $("#intermedio_f").val(); let intermedio_f2 = $("#intermedio_f2").val();
        let avanzado_f = $("#avanzado_f").val(); let avanzado_f2 = $("#avanzado_f2").val();
        let profesional_f = $("#profesional_f").val(); let profesional_f2 = $("#profesional_f2").val();
        let intermedio_i = parseInt(basico_f) + 1;
        let avanzado_i = parseInt(intermedio_f) + 1;
        let profesional_i = parseInt(avanzado_f) + 1;
        let i = 0; let cur = 0; let ba = 0; let inte = 0; let av = 0; let pr = 0;

        {{-- curso --}}
        if(curso == ""){
            i++; cur++;
            message.push('El campo curso es obligatorio.');

        }else if(curso.length > 255){
            i++; cur++;
            message.push('El campo curso no debe contener más de 255 caracteres.');

        }else if(curso.length < 3){
            i++; cur++;
            message.push('El campo curso debe contener al menos 03 caracteres.');

        }

        {{-- basico --}}
        if (basico_f == "") {
            i++; ba++;
            message.push('El campo básico es obligatorio.');
        }else if (basico_f < 1){
            i++; ba++;
            message.push('El campo básico debe ser mayor que 0.');
        }else if (basico_f > 100){
            i++; ba++;
            message.push('El campo básico debe ser menor que 101.');
        }

         {{-- intermedio --}}
        if (intermedio_f == "") {
            i++; inte++;
            message.push('El campo intermedio es obligatorio.');
        }else if (intermedio_f < intermedio_i){
            i++; inte++;
            message.push(`El campo intermedio debe ser mayor que ${basico_f}.`);

        }else if (intermedio_f > 100){
            i++; inte++;
            message.push('El campo intermedio debe ser menor que 101.');
        }

        {{-- avanzado --}}
        if (avanzado_f == "") {
            i++; av++;
            message.push('El campo avanzado es obligatorio.');
        }else if (avanzado_f < avanzado_i){
            i++; av++;
            message.push(`El campo avanzado debe ser mayor que ${intermedio_f}.`);
        }else if (avanzado_f > 100){
            i++; av++;
            message.push('El campo avanzado debe ser menor que 101.');
        }
        // profesional
        if (profesional_f == "") {
            i++; pr++;
            message.push('El campo profesional es obligatorio.');
        }else if (profesional_f < profesional_i){
            i++; pr++;
            message.push(`El campo profesional debe ser mayor que ${avanzado_f}.`);
        }else if (profesional_f > 100){
            i++; pr++;
            message.push('El campo profesional debe ser menor que 101.');
        }

        if(i > 0 && val == "si"){
            let u = 0;
            if(pro == 'Registro'){

                if (cur > 0) {
                    u++;
                    $("#curso").val('');
                    $("#curso").attr('class', 'form-control border border-danger');
                    $("#curso_e").html(message[u]);
                }

                if (ba > 0) {
                    u++;
                    $("#basico_f").val('1');
                    $("#basico_f").attr('class', 'form-control border border-danger');
                    $("#basico_f_e").html(message[u]);
                }

                if (inte > 0) {
                    u++;
                    $("#intermedio_f").val(parseInt($("#basico_f").val()) + 1);
                    $("#intermedio_f").attr('class', 'form-control border border-danger');
                    $("#intermedio_f").attr('min', parseInt($("#basico_f").val()) + 1);
                    $("#intermedio_f_e").html(message[u]);
                }

                if (av > 0) {
                    u++;
                    $("#avanzado_f").val(parseInt($("#intermedio_f").val()) + 1);
                    $("#avanzado_f").attr('class', 'form-control border border-danger');
                    $("#avanzado_f").attr('min', parseInt($("#intermedio_f").val()) + 1);
                    $("#avanzado_f_e").html(message[u]);
                }

                if (pr > 0) {
                    u++;
                    $("#profesional_f").val(parseInt($("#avanzado_f").val()) + 1);
                    $("#profesional_f").attr('class', 'form-control border border-danger');
                    $("#profesional_f").attr('min', parseInt($("#avanzado_f").val()) + 1);
                    $("#profesional_f_e").html(message[u]);
                }

            }else{

                if (cur > 0) {
                    u++;
                    $("#curso").val(curso2);
                    $("#curso").attr('class', 'form-control border border-danger');
                    $("#curso_e").html(message[u]);
                }

                if (ba > 0) {
                    u++;
                    $("#basico_f").val(basico_f2);
                    $("#basico_f").attr('class', 'form-control border border-danger');
                    $("#basico_f_e").html(message[u]);
                }

                if (inte > 0) {
                    u++;
                    $("#intermedio_f").val(intermedio_f2);
                    $("#intermedio_f").attr('class', 'form-control border border-danger');
                    $("#intermedio_f").attr('min', intermedio_f2);
                    $("#intermedio_f_e").html(message[u]);
                }

                if (av > 0) {
                    u++;
                    $("#avanzado_f").val(avanzado_f2);
                    $("#avanzado_f").attr('class', 'form-control border border-danger');
                    $("#avanzado_f").attr('min', avanzado_f2);
                    $("#avanzado_f_e").html(message[u]);
                }
                if (pr > 0) {
                    u++;
                    $("#profesional_f").val(profesional_f2);
                    $("#profesional_f").attr('class', 'form-control border border-danger');
                    $("#profesional_f").attr('min', profesional_f2);
                    $("#profesional_f_e").html(message[u]);
                }

            }

        }

        if(i > 0){
            boo = false;
        }

        return boo;
    }

    function curso(val) {
        $("#button_curso").attr("class", "btn btn-success");
        $("#button_pregunta").attr("class", "btn btn-secondary");
        $('#pregunta_ventana').fadeOut();
        $('#curso_ventana').fadeIn();
        $("#anterior").attr("class", "btn btn-secondary");
        $("#anterior").attr("disabled", "disabled");
        $("#siguiente").attr("class", "btn btn-primary");
        $("#siguiente").removeAttr("disabled");
        $("#ventana").val('1');
        val_curso(val);
    }

    function val_curso(val){
        let ventana = $('#ventana').val();
        let boo = validacion_curso(val);

        if (boo == true) {
            if(ventana == 1){
                $("#button_curso").attr("class", "btn btn-success");
                $("#siguiente").attr("class", "btn btn-primary");
                $("#siguiente").removeAttr("disabled");
                $("#button_pregunta").attr("class", "btn btn-primary");
                $("#button_pregunta").removeAttr("disabled");

            }
        }else{
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
        val_curso("si");
    }

    function ante() {
        var ventana = $('#ventana').val();

        if (ventana == 2) {

            curso("si");

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


    function agreg_pre(ag) {
        $.ajax({
            type: "POST",
            url:"{{route('Curso.agreg_pre')}}",
            data: $("#formulario").serialize()+'&ag='+ag,
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

    function agreg_resp(id,ag) {
        $.ajax({
            type: "POST",
            url:"{{route('Curso.agreg_resp')}}",
            data: $("#formulario").serialize()+'&id='+id+'&ag='+ag,
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
                agreg_pre("no");
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
                agreg_resp(id,"no");
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
        curso("no");
        clear_p();
        $('#intermedio_i').html(1);
        $('#avanzado_i').html(1);
        $('#profesional_i').html(1);
        $("#intermedio_f").attr("min", 1);
        $("#avanzado_f").attr("min", 1);
        $("#profesional_f").attr("min", 1);
    }

    function val_pregunta(){
        $.ajax({
            type: "POST",
            url:"{{route('Curso.val_pregunta')}}",
            success: function(valores) {
                if(valores.boo == false){

                    if (valores.pregunta != true) {

                        $('#val_pregunta').html(`<i class="fa fa-trash-alt"></i> ${valores.pregunta}`);

                    }else if(typeof valores.respuesta != true){

                        $('#val_pregunta').html(`<i class="fa fa-trash-alt"></i> ${valores.respuesta}`);
                    }
                }
                return valores.boo;
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }


@endsection

{{-- funcion validacion --}}
@section('validacion')

    let boo2 = validacion_curso('si');
    let boo3 = val_pregunta();


    if(boo2 == false || boo3 == false){
        i++;
    }

    if(i > 0){

        if (boo == false) {
            val_curso('no');
        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection
{{-- funcion reiniciar --}}
@section('reiniciar')
    $("#curso_e").html('');
    $("#basico_f_e").html('');
    $("#intermedio_f_e").html('');
    $("#avanzado_f_e").html('');
    $("#profesional_f_e").html('');

    $("#curso").attr('class', 'form-control');
    $("#basico_f").attr('class', 'form-control');
    $("#intermedio_f").attr('class', 'form-control');
    $("#avanzado_f").attr('class', 'form-control');
    $("#profesional_f").attr('class', 'form-control');
@endsection
{{-- error en el registro o edicion --}}
@section('error')
    let cur = 0;

    if (xhr.responseJSON.errors.curso){
        $("#curso_e").html(xhr.responseJSON.errors.curso);
        $("#curso").attr('class', 'form-control border border-danger');
        cur++;
    }


    if(pro == 'Registro'){

        if (cur > 0) {
            $("#curso").val('');
        }

    }else{

        if (cur > 0) {
            $("#curso").val($("#curso2").val());
        }
    }
@endsection
