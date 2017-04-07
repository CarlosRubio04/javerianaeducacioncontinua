$(document).ready(function () {
    getFacultades();
});

function login() {
    $.post("../views/loginAdmin.php", {user: $("#Email").val(), pass: $("#Password").val()})
            .done(function (data) {
                alert(data.mensaje);
                location.reload();
            });
}
function logout() {
    $.post("../views/logoutAdmin.php")
            .done(function (data) {
                alert(data.mensaje);
                location.reload();
            });
}
function getFacultades() {
    $.get("../views/facultades.php", function (data) {
        var textoOptions = '<option value="">Facultad</option>\n';
        for (var a in data) {
            textoOptions += '<option value="' + data[a].valor + '">'
                    + data[a].texto + '</option>\n';
        }
        $('#sfacultades').html(textoOptions);
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
	getProgramaPre();
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
function getPrograma() {
    $.get("../views/programa.php?programa=" + $('#sprogramas').val(), function (
            data) {
        if (data.nombre !== undefined) {
            $('#horas').html(data.horas);
            $('#nombre').html(data.nombre);
            $('#mes').html(data.mes);
            $('#dia').html(data.dia);
            $('#programa').val(data.nombre);
            $('#perfil').html(data.perfil);
            $('#descripcion').html(data.descripcion);
            $('#detalle').html(data.detalle);

        }
    });
}

function createLink(){
    $('#link').html('http://www.javerianaeducacioncontinua.com/public/?target='+ $('#origen').val()+'&programa='+$('#sprogramas').val());
}