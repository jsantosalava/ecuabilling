$(document).ready(function() {
    mostrarCampania();

});

$('#guardarCampania').submit(function(e) {
    e.preventDefault();
    agregarCampania()
});

function agregarCampania() {
    var nombreCampania = $('#nombreCampania').val();
    
    var user = $('#user').val();
    var boton = 'agregarCampania'

    $.ajax({
        url: '../controlador/controladorCampania.php',
        cache: false,
        type: 'POST',
        data: { nombreCampania, user, boton },
        success: function(Resp) {
            toastr.success(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                $("#guardarCampania")[0].reset();
                mostrarCampania()
        },

    });
}

function mostrarCampania() {
   
    var boton = 'mostrarCampania';
    $.ajax({
        url: '../controlador/controladorCampania.php',
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
                $("#mostrarCampania").append('<b id="espe">Sin Datos</b>');

            } else {

                html = '<div id="tabSucursal">';
                for (var i = 0; i < gasto.length; i++) {

                    eliminar = 'onclick="borrarCampania(' + gasto[i][0] + ')"';

                    html += '<li class="list-group-item d-flex justify-content-between align-items-center" >' + gasto[i][1] + '<div class="btn-group" role="group" aria-label="Basic example">';

                    html += '<button type="button" class="btn btn-danger" title="Borrar" ' + eliminar + '><i class="material-icons d-inline-block align-top">delete</i></button></div></li>';
                }
                html += "</div>";
                $("#mostrarCampania").html(html);
            }
        },

    });
}

function borrarCampania(id) {
    var result = confirm("Está seguro de Eliminar?");
    if (result) {
        var user = $('#user').val();
        var boton = 'borrarCampania'
        $.ajax({
            url: '../controlador/controladorCampania.php',
            type: 'POST',
            cache: false,
            data: { id, user, boton }
        }).done(function(Resp) {
            toastr.info(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                mostrarCampania()
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