$(document).ready(function() {
    mostrarContactabilidad();

    $.post("../includes/campania.php", function(data) {
        $("#campania").html(data);
        
    });

});

$('#guardarContactabilidad').submit(function(e) {
    e.preventDefault();
    agregarContactabilidad()
});

function agregarContactabilidad() {

    var campania = $('#campania').val();
    var nombreContactabilidad = $('#nombreContactabilidad').val();
    
    var user = $('#user').val();
    var boton = 'agregarContactabilidad'

    $.ajax({
        url: '../controlador/controladorContactabilidad.php',
        cache: false,
        type: 'POST',
        data: { campania, nombreContactabilidad, user, boton },
        success: function(Resp) {
            toastr.success(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                $("#guardarContactabilidad")[0].reset();
                mostrarContactabilidad()
        },

    });
}

function mostrarContactabilidad() {
   
    var boton = 'mostrarContactabilidad';
    $.ajax({
        url: '../controlador/controladorContactabilidad.php',
        cache: false,
        type: 'POST',
        data: {  boton },
        success: function(Resp) {
            var gasto = eval(Resp);
            var editar = '';
            var eliminar = '';
            if (Resp === '0') {
                $("#tabSucursal").remove();
                $("#espe").remove();
                $("#mostrarContactabilidad").append('<b id="espe">Sin Datos</b>');

            } else {

                html = '<div id="tabSucursal">';
                for (var i = 0; i < gasto.length; i++) {

                    eliminar = 'onclick="borrarContactabilidad(' + gasto[i][0] + ')"';

                    html += '<li class="list-group-item d-flex justify-content-between align-items-center" >' + gasto[i][2] + '-> ' + gasto[i][1] + '<div class="btn-group" role="group" aria-label="Basic example">';

                    html += '<button type="button" class="btn btn-danger" title="Borrar" ' + eliminar + '><i class="material-icons d-inline-block align-top">delete</i></button></div></li>';
                }
                html += "</div>";
                $("#mostrarContactabilidad").html(html);
            }
        },

    });
}

function borrarContactabilidad(id) {
    var result = confirm("Está seguro de Eliminar?");
    if (result) {
        var user = $('#user').val();
        var boton = 'borrarContactabilidad'
        $.ajax({
            url: '../controlador/controladorContactabilidad.php',
            type: 'POST',
            cache: false,
            data: { id, user, boton }
        }).done(function(Resp) {
            toastr.info(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                mostrarContactabilidad()
        });

    }
}
