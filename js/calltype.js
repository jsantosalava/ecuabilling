$(document).ready(function() {
    mostrarCalltype();

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

    $("#contactabilidad").change(function () {
                    $('#segcalltype').find('option').remove().end().append('<option value="0"></option>').val('SELECCIONAR');       
                        //html="<label>seleccionar  : </label><select class='form-control' name='nivel2' id='nivel2'></select>";
                        //$("#select_n2").html(html);                   
                    $("#contactabilidad option:selected").each(function () {
                        idnivel1_select = $(this).val();
                        $.post("../includes/segcalltype.php", { idnivel1_select: idnivel1_select }, function(data){
                            $("#segcalltype").html(data);
                        });            
                    });
                })
});

$('#guardarCalltype').submit(function(e) {
    e.preventDefault();
    guardarCalltype()
});

function guardarCalltype() {
    
    var segcalltype = $('#segcalltype').val();
    var calltype = $('#calltype').val();
   
    var user = $('#user').val();
    var boton = 'guardarCalltype'

    $.ajax({
        url: '../controlador/controladorCalltype.php',
        cache: false,
        type: 'POST',
        data: {   calltype,segcalltype, user,boton },
        success: function(Resp) {
            toastr.success(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                $("#guardarCalltype")[0].reset();
                mostrarCalltype()
        },
    });
}

function mostrarCalltype() {
    var establecimiento = $('#establecimientorol').val();
    var user = $('#user').val();
    var boton = 'mostrarCalltype';
    $.ajax({
        url: '../controlador/controladorCalltype.php',
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
                $("#mostrarCalltype").append('<b id="espe">Sin Datos</b>');

            } else {

                html = '<div id="tabSucursal">';
                for (var i = 0; i < gasto.length; i++) {

                    eliminar = 'onclick="borrarCalltype(' + gasto[i][0] + ')"';

                    html += '<li class="list-group-item d-flex justify-content-between align-items-center" >' + gasto[i][2] + '-> ' + gasto[i][1] + '<div class="btn-group" role="group" aria-label="Basic example">';

                    html += '<button type="button" class="btn btn-danger" title="Borrar" ' + eliminar + '><i class="material-icons d-inline-block align-top">delete</i></button></div></li>';
                }
                html += "</div>";
                $("#mostrarCalltype").html(html);
            }
        },

    });
}

function borrarCalltype(id) {
    var result = confirm("Está seguro de Eliminar?");
    if (result) {
        var user = $('#user').val();
        var boton = 'borrarCalltype'
        $.ajax({
            url: '../controlador/controladorCalltype.php',
            type: 'POST',
            cache: false,
            data: { id, user, boton }
        }).done(function(Resp) {
            toastr.info(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                mostrarCalltype()
        });

    }
}