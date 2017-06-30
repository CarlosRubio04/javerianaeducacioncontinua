$(document).ready(function () {
    getFacultades();
    getAllProgramas();
    // getIp();
});

function getFacultades() {
    $.get("../views/facultades.php", function (data) {
        var textoOptions = '<option value="">Facultad</option>\n';
        for (var a in data) {
            textoOptions += '<option value="' + data[a].valor + '">'
                    + data[a].texto + '</option>\n';
        }
        $('#sfacultades').html(textoOptions);
        getProgramaPre();
    });

}
function getCategorias() {
    $.get("../views/categorias.php?facultad=" + $('#sfacultades').val(), function (data) {
        var textoOptions = '<option value="">Categoria</option>\n';
        for (var a in data) {
            textoOptions += '<option value="' + data[a].valor + '">'
                    + data[a].texto + '</option>\n';
        }
        $('#scategorias').html(textoOptions);
        if ($('#programaprecargado').val() !== undefined) {
            $('#scategorias').val(data.categoria);
            getProgramasPre();
        }
    });
}
function getCategoriasPre(id) {
    var txt = '';
    $.get("../views/categorias.php?facultad=" + $('#sfacultades').val(), function (data) {
        var textoOptions = '<option value="">Categoria</option>\n';
        for (var a in data) {
            textoOptions += '<option value="' + data[a].valor + '">'
                    + data[a].texto + '</option>\n';
            if(data[a].valor == id){
                txt =  data[a].texto;
            }
        }
        $('#scategorias').html(textoOptions);
        if ($('#programaprecargado').val() !== undefined) {
            $('#scategorias').val(id);
            $('#Arrowscategorias').text(txt);
            getProgramasPre();
        }
    });
    
}


function getProgramas() {
    $.get("../views/programas.php?facultad=" + $('#sfacultades').val()
            + "&categoria=" + $('#scategorias').val(), function (data) {
        var textoOptions = '<option value="">Programa</option>\n';
        for (var a in data) {
            textoOptions += '<option value="' + data[a].valor + '">'
                    + data[a].texto + '</option>\n';
        }
        $('#sprogramas').html(textoOptions);
    });
}

function getAllProgramas() {
    $.get("../views/programas.php", function (data) {
        var textoOptions = '<option value="">Programa</option>\n';
        for (var a in data) {
            textoOptions += '<option value="' + data[a].valor + '">'
                    + data[a].texto + '</option>\n';
        }
        $('#programa').html(textoOptions);
    });
}

function getProgramasPre() {
    $.get("../views/programas.php?facultad=" + $('#sfacultades').val()
            + "&categoria=" + $('#scategorias').val(), function (data) {
        var textoOptions = '<option value="">Programa</option>\n';
        for (var a in data) {
            textoOptions += '<option value="' + data[a].valor + '">'
                    + data[a].texto + '</option>\n';
        }
        $('#sprogramas').html(textoOptions);
        $('#sprogramas').val($('#programaprecargado').val());
    });
}
function getPrograma() {
    $.get("../views/programa.php?programa=" + $('#sprogramas').val(), function (
            data) {
        if (data.nombre !== undefined) {
            $('#horas').html(data.horas);
            $('#precio').html(data.precio);
            $('#nombre').html(data.nombre);
            $('#mes').html(data.mes);
            $('#dia').html(data.dia);
            $('#programa').val(data.id);
            $('#Arrowsprogramas').text(data.nombre.substring(0, 25) + '...');
            $('#Arrowprograma').text(data.nombre.substring(0, 25) + '...');
            $('#perfil').html(data.perfil);
            $('#descripcion').html(data.descripcion);
            $('#detalle').html(data.detalle);
            $('#contactanos').html(data.telefono);
            var imagen_video = '';
            if (data.url_video != undefined && data.url_video != 'null' && data.url_video != '') {
                //imagen_video += "<div class='flex'><video id='video' controls width='95%' height='300px' > <source src='" + data.url_video + "' /></video> </div>";
                imagen_video += "<iframe width='100%' height='300' src='" + data.url_video + "?html5=1' frameborder='0' allowfullscreen></iframe><br><br>";
            }
            if (data.url_img != undefined && data.url_img != 'null' && data.url_img != '') {
                imagen_video += "<div class='cont-img'> <img id='imagen' height='1456' width='3556' src='" + data.url_img + "' /> </div>";
            }
            $('#encabezado_visual').html(imagen_video);

        }
    });
}

function getProgramaPre() {
    $.get("../views/programa.php?programa=" + $('#programaprecargado').val(), function (
            data) {
        if (data.nombre !== undefined) {
            $('#horas').html(data.horas);
            $('#precio').html(data.precio);
            $('#nombre').html(data.nombre);
            $('#mes').html(data.mes);
            $('#dia').html(data.dia);
            $('#programa').val(data.id);
            $('#Arrowsprogramas').text(data.nombre.substring(0, 25) + '...');
            $('#Arrowprograma').text(data.nombre.substring(0, 25) + '...');
            $('#perfil').html(data.perfil);
            $('#descripcion').html(data.descripcion);
            $('#detalle').html(data.detalle);
            $('#contactanos').html(data.telefono);
            var imagen_video = '';
            if (data.url_video != undefined && data.url_video != 'null' && data.url_video != '') {
                //imagen_video += "<div class='flex'><video id='video' controls width='95%' height='300px' > <source src='" + data.url_video + "' /></video> </div>";
                imagen_video += "<iframe width='100%' height='300' src='" + data.url_video + "?html5=1' frameborder='0' allowfullscreen></iframe><br><br>";
            }
            if (data.url_img != undefined && data.url_img != 'null' && data.url_img != '') {
                imagen_video += "<div class='cont-img'> <img id='imagen' height='1456' width='3556' src='" + data.url_img + "' /> </div>";
            }
            $('#encabezado_visual').html(imagen_video);
            console.log(data);
            $('#sfacultades').val(data.facultad);
            $('#Arrowsfacultades').text(data.facultad_nombre);
            $('#Arrowscategorias').text(data.categoria_nombre);
            getCategoriasPre(data.categoria);
        }
    });
}
function registro() {

    valor = $("#Nombre").val();
    if ($.trim($("#Nombre").val()) == '' || !/^[a-zA-Z_áéíóúñ\s]*$/.test($.trim($("#Nombre").val()))) {
        alert('ingrese nombre');
        return false;
    }
    else if ($.trim($("#Apellido").val()) == '' || !/^[a-zA-Z_áéíóúñ\s]*$/.test($.trim($("#Apellido").val()))) {
        alert('informacion de apellido incorrecta por favor verifique los datos');
        return false;
    }
    else if ($.trim($("#Mail").val()) == '' || !/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(($.trim($("#Mail").val())))) {
        alert('Email incorrecto');
        return false;
    }
    else if ($.trim($("#Celular").val()) == '' || !/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/.test(($.trim($("#Celular").val())))) {
        alert('Numero celular no valido');
        return false;
    }
    else if ($.trim($("#programa").val()) == '' || !/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/.test(($.trim($("#Celular").val())))) {
        alert('Seleccione un programa');
        return false;
    }
    else if ($("#check").is(':checked') == false) {
        alert('debe aceptar ser contactado para poder enviar sus datos.');
        return false;
    }
    $.post("../views/registro.php", {programa: $("#programa").val(), nombre: $("#Nombre").val(), apellidos: $("#Apellido").val(), email: $("#Mail").val(), celular: $("#Celular").val(), contactar: $("#check").val(), target: $("#target").val()}).done(function (data) {
//         if (data.codigo == 'OK') {
//             location.href = 'gracias.php';
//             console.log (data.mensaje);
//         } else {
//             alert(data.mensaje);
//             console.log (data.mensaje);
// //            location.reload();
//         }
        location.href = 'gracias.php';
    });

}


// function getIp() {
//     $.get("http://api.hostip.info/get_html.php", function (data) {
//         var hostipInfo = data.split("\n");
//         for (var i = 0; hostipInfo.length >= i; i++) {
//             var ipAddress = hostipInfo[i].split(":");
//             if (ipAddress[0] == "IP") {
//                 $('#ip').val(ipAddress[1].trim());
//                 return false;
//             }
//         }
//     });
// }
