$(document).ready(function() {
    mostrarMotivo();

});

$('#guardarMotivo').submit(function(e) {
    e.preventDefault();
    agregarMotivo()
});

function agregarMotivo() {
    var nombreMotivo = $('#nombreMotivo').val();
    
    var user = $('#user').val();
    var boton = 'agregarMotivo'

    $.ajax({
        url: '../controlador/controladorMotivo.php',
        cache: false,
        type: 'POST',
        data: { nombreMotivo, user, boton },
        success: function(Resp) {
            toastr.success(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                $("#guardarMotivo")[0].reset();
                mostrarMotivo()
        },

    });
}

function mostrarMotivo() {
   
    var boton = 'mostrarMotivo';
    $.ajax({
        url: '../controlador/controladorMotivo.php',
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
                $("#mostrarMotivo").append('<b id="espe">Sin Datos</b>');

            } else {

                html = '<div id="tabSucursal">';
                for (var i = 0; i < gasto.length; i++) {

                    eliminar = 'onclick="borrarMotivo(' + gasto[i][0] + ')"';

                    html += '<li class="list-group-item d-flex justify-content-between align-items-center" >' + gasto[i][1] + '<div class="btn-group" role="group" aria-label="Basic example">';

                    html += '<button type="button" class="btn btn-danger" title="Borrar" ' + eliminar + '><i class="material-icons d-inline-block align-top">delete</i></button></div></li>';
                }
                html += "</div>";
                $("#mostrarMotivo").html(html);
            }
        },

    });
}

function borrarMotivo(id) {
    var result = confirm("Está seguro de Eliminar?");
    if (result) {
        var user = $('#user').val();
        var boton = 'borrarMotivo'
        $.ajax({
            url: '../controlador/controladorMotivo.php',
            type: 'POST',
            cache: false,
            data: { id, user, boton }
        }).done(function(Resp) {
            toastr.info(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                mostrarMotivo()
        });

    }
}

// function siniva() {
//     var valorsiniva_producto = $('#valorsiniva_producto').val();
//     var coniva = valorsiniva_producto * 1.12;
//     $('#valorconiva_producto').val(coniva.toFixed(2));

//     if (valorsiniva_producto) {
//         $("#valorconiva_producto").prop("disabled", true);
//     } else {
//         $("#valorconiva_producto").prop("disabled", false);
//     }
// }

// function coniva() {
//     var valorconiva_producto = $('#valorconiva_producto').val();
//     var siniva = (valorconiva_producto / 1.12);
//     $('#valorsiniva_producto').val(siniva.toFixed(2));

//     if (valorconiva_producto) {
//         $("#valorsiniva_producto").prop("disabled", true);
//     } else {
//         $("#valorsiniva_producto").prop("disabled", false);
//     }
// }