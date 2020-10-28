$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

function error(xhr, textStatus, errorMessage) {
    console.log("Error:" + errorMessage + textStatus + xhr.status);
    $.each(xhr.responseJSON, function(indice, valor) {
        console.error(indice + " - " + valor);
        //console.log(´%c${indice} - ${valor}´,'color:red;');
        //console.log("%cHola",'color:red;');
    });
    setDone();
    $("body").overhang({
        type: "error",
        message: "error validacion!"
    });
}

function combo(tabla, columna, id, select, dat, opt, dato, cons) {
    // alert(tabla+" "+columna+" "+id+" "+select+" "+dat+" "+opt+" "+cons);

    $.ajax({
        type: "POST",
        url: "{{route('combobox.store')}}",
        data:
            "id=" +
            id +
            "&tabla=" +
            tabla +
            "&columna=" +
            columna +
            "&dat=" +
            dat +
            "&opt=" +
            opt +
            "&dato=" +
            dato +
            "&cons=" +
            cons,
        success: function(registro) {
            $("#" + select).html(registro.combo);
            //console.log("%c"+registro.combo,'color:blue;');
            console.log("%cCombobox realizado con éxito",'color:green;');
            return false;
        },
        error: function(xhr, textStatus, errorMessage) {
            error(xhr, textStatus, errorMessage);
        }
    });
    return false;
}

function letra(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras =
        " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function espacio(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras =
        "áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890_-";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function numero(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function numero_e(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function numero_t(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789:";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function mayuscula(mayu) {
    mayu.value = mayu.value.toUpperCase();
}
