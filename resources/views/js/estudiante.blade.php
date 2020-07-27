@section('document')

    $("#bs_cedula").on("keyup", function() {
        cargar();
    });

    $("#bs_nombre").on("keyup", function() {
        cargar();
    });

    $("#bs_apellido").on("keyup", function() {
        cargar();
    });

    $("#bs_sex").on("change", function() {
        cargar();
    });

    $("#state").on("change", function() {
        var state = $("#state").val();
        combo("municipality", "state", state, "municipality", 0, "municipio", "municipalitys", 2);
    });

@endsection

@section('url_registro') var url = "{{ route('Estudiante.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Estudiante.update') }}"; @endsection

@section('select')


    $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');


@endsection

@section('registro')

    $('#cedula').val('');
    $('#nombre').val('');
    $('#apellido').val('');
    $('#sex').val('null');
    $('#telefono').val('');
    $('#state').val('null');
    $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');
    $('#direccion').val('');
    $('#fecha_nacimiento').val('');
    $('#lugar_nacimiento').val('');
    $('#descripcion').val('');
    $('#cedula_r').val('');
    $('#nombre_r').val('');
    $('#apellido_r').val('');
    $('#sex_r').val('null');
    $('#telefono_r').val('');
    $('#state_r').val('null');
    $('#municipality_r').html('<option value="null" disabled selected>Seleccione un municipio</option>');
    $('#direccion_r').val('');
    $('#ocupacion_laboral').val('null');
    $('#parentesco').val('');
    $('#cancelar').fadeOut();
    $('#buscar').fadeIn();
    $('#formu').fadeOut();
    $('#representant').fadeOut();
    $('#estudiante').fadeIn();


@endsection

@section('edicion')

    $('#nombre2').val($('#nombre').val());
    $('#apellido2').val($('#apellido').val());
    $('#sex2').val($('#sex').val());
    $('#telefono2').val($('#telefono').val());
    $('#parentesco2').val($('#parentesco').val());
    $('#municipality2').val($('#municipality').val());
    $('#direccion2').val($('#direccion').val());
    $('#fecha_nacimiento2').val($('#fecha_nacimiento').val());
    $('#lugar_nacimiento2').val($('#lugar_nacimiento').val());
    $('#descripcion2').val($('#descripcion').val());
    $('#representante2').val($('#representante').val());
    $('#parentesco2').val($('#parentesco').val());


 @endsection

@section('delete') url: "{{url('Estudiante')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Estudiante.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Estudiante.mostrar')}}", @endsection

@section('rellenar')

    $("#cedula").val(valores.cedula);
    $("#nombre").val(valores.nombre);
    $("#nombre2").val(valores.nombre);
    $("#apellido").val(valores.apellido);
    $("#apellido2").val(valores.apellido);
    $("#sex").val(valores.sex);
    $("#sex2").val(valores.sex);
    $("#telefono").val(valores.telefono);
    $("#telefono2").val(valores.telefono);
    $("#state").val(valores.state);
    combo("municipality", "state", valores.state, "municipality", valores.municipality, "municipio", "municipalitys", 1);
    $("#municipality2").val(valores.municipality);
    $("#direccion").val(valores.direccion);
    $("#direccion2").val(valores.direccion);
    $("#fecha_nacimiento").val(valores.fecha_nacimiento);
    $("#fecha_nacimiento2").val(valores.fecha_nacimiento);
    $("#lugar_nacimiento").val(valores.lugar_nacimiento);
    $("#lugar_nacimiento2").val(valores.lugar_nacimiento);
    $("#descripcion2").val(valores.descripcion);
    $("#ocupacion_laboral").val(valores.ocupacion_laboral);
    $("#persona").val(valores.persona);

@endsection

@section('editar')

    $("#cedula").attr("readonly", "readonly");
    $("#nombre").removeAttr("readonly");
    $("#apellido").removeAttr("readonly");
    $("#sex").removeAttr("disabled");
    $("#telefono").removeAttr("readonly");
    $("#ocupacion_laboral").removeAttr("disabled");
    $("#state").removeAttr("disabled");
    $("#municipality").removeAttr("disabled");
    $("#direccion").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#cedula").attr("readonly", "readonly");
    $("#nombre").attr("readonly", "readonly");
    $("#apellido").attr("readonly", "readonly");
    $("#sex").attr("disabled", "disabled");
    $("#telefono").attr("readonly", "readonly");
    $("#ocupacion_laboral").attr("disabled", "disabled");
    $("#state").attr("disabled", "disabled");
    $("#municipality").attr("disabled", "disabled");
    $("#direccion").attr("readonly", "readonly");

@endsection
