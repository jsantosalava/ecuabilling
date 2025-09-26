$(document).ready(function() {
    mostrarSegCalltype();

    $.post("../includes/campania.php", function(data) {
        $("#campania").html(data);
        
    });

    $("#campania").change(function () {
                    $('#contactabilidad').find('option').remove().end().append('<option value="0"></option>').val('SELECCIONAR');       
                        //html="<label>seleccionar  : </label><select class='form-control' name='nivel2' id='nivel2'></select>";
                        //$("#select_n2").html(html);                   
                    $("#campania option:selected").each(function () {
                        idnivel1_select = $(this).val();
                        $.post("../includes/contactabilidad.php", { idnivel1_select: idnivel1_select }, function(data){
                            $("#contactabilidad").html(data);
                        });            
                    });
                })
});

$('#guardarSegCalltype').submit(function(e) {
    e.preventDefault();
    agregarSegCalltype()
});

function agregarSegCalltype() {
    
    
    var contactabilidad = $('#contactabilidad').val();
    var segcalltype = $('#segcalltype').val();
   
    var user = $('#user').val();
    var boton = 'agregarSegCalltype'

    $.ajax({
        url: '../controlador/controladorSegCalltype.php',
        cache: false,
        type: 'POST',
        data: {   contactabilidad,segcalltype, user,boton },
        success: function(Resp) {
            toastr.success(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                $("#guardarSegCalltype")[0].reset();
                mostrarSegCalltype()
        },

    });
}

function mostrarSegCalltype() {
    var establecimiento = $('#establecimientorol').val();
    var user = $('#user').val();
    var boton = 'mostrarSegCalltype';
    $.ajax({
        url: '../controlador/controladorSegCalltype.php',
        cache: false,
        type: 'POST',
        data: { user, establecimiento, boton },
        success: function(Resp) {
            var gasto = eval(Resp);
            var editar = '';
            var eliminar = '';
            if (Resp === '0') {
                $("#tabSucursal").remove();
                $("#espe").remove();
                $("#mostrarSegCalltype").append('<b id="espe">Sin Datos</b>');

            } else {

                html = '<div id="tabSucursal">';
                for (var i = 0; i < gasto.length; i++) {

                    eliminar = 'onclick="borrarSegCalltype(' + gasto[i][0] + ')"';

                    html += '<li class="list-group-item d-flex justify-content-between align-items-center" >' + gasto[i][2] + '-> ' + gasto[i][1] + '<div class="btn-group" role="group" aria-label="Basic example">';

                    html += '<button type="button" class="btn btn-danger" title="Borrar" ' + eliminar + '><i class="material-icons d-inline-block align-top">delete</i></button></div></li>';
                }
                html += "</div>";
                $("#mostrarSegCalltype").html(html);
            }
        },

    });
}

function borrarSegCalltype(id) {
    var result = confirm("Está seguro de Eliminar?");
    if (result) {
        var user = $('#user').val();
        var boton = 'borrarSegCalltype'
        $.ajax({
            url: '../controlador/controladorSegCalltype.php',
            type: 'POST',
            cache: false,
            data: { id, user, boton }
        }).done(function(Resp) {
            toastr.info(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                mostrarSegCalltype()
        });

    }
}