$(document).ready(function() {
    $(':input:visible:enabled:first').focus();
    mostrarCliente();
    mostrarInfo()

});

$('#registrarCliente').submit(function(e) {
    e.preventDefault();
    agregarCliente()
});

$('#editarCliente').submit(function(e) {
    e.preventDefault();
    actualizarCliente()
});

function agregarCliente() {

        var cliente = $('#cliente').val();
        var cedula = $('#cedula').val();
        var fecha = $('#fecha').val();
        var contrato = $('#contrato').val();
        var correo = $('#correo').val();
        var rango = $('#rango').val();
        var director = $('#director').val();
        var gerente = $('#gerente').val();
        var supervisor = $('#supervisor').val();
        var asesor = $('#asesor').val();
        var sucursal = $('#sucursal').val();
        
        var user = $('#user').val();
        var boton = 'agregarCliente'
        $.ajax({
            url: '../controlador/controladorCliente.php',
            cache: false,
            type: 'POST',
            data: {cliente, cedula, fecha, contrato, rango, director, gerente, supervisor,asesor,user,correo,sucursal, boton },
            
            error:function(){
                alert('error')
            },
            success: function(Resp) {
                toastr.success(Resp, {
                        "timeOut": "2000",
                        "closeButton": true
                    })
                    $("#registrarCliente")[0].reset();
                    $(':input:visible:enabled:first').focus();

            },
            

        });
    

}

function mostrarCliente() {
    $.fn.dataTable.ext.errMode = 'throw';
    
    boton = "mostrarCliente";
    var table = $('#tablaCliente').DataTable({
        "aLengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        "iDisplayLength": 5,
        "destroy": true,
        "bDeferRender": true,
        "aaSorting": [],
        "sPaginationType": "full_numbers",
        "ajax": {
            "url": "../controlador/controladorCliente.php",
            "type": "POST",
            "dataType": "json",
            "serverSide": true,
            "data": {  boton },
            dataFilter: function(reps) {
                if (reps === '0') {
                    toastr.error('No se Encontro Información!', {
                        "timeOut": "2000",
                        "closeButton": true
                    })
                } else {
                    return reps;
                }

            },
        },
        "columns": [{
            "data": "cedula_info",
            "defaultContent": ""
        },{
            "data": "nombre_info",
            "defaultContent": ""
        }, {
            "data": "fecha_info",
            "defaultContent": ""
        },{
            "data": "mes_info",
            "defaultContent": ""
        },{
            "data": "correo_info",
            "defaultContent": ""
        },{
            "data": "contrato_info",
            "defaultContent": ""
        },{
            "data": "rango_info",
            "defaultContent": ""
        },{
            "data": "director_info",
            "defaultContent": ""
        },{
            "data": "gerente_info",
            "defaultContent": ""
        },{
            "data": "supervisor_info",
            "defaultContent": ""
        },{
            "data": "asesor_info",
            "defaultContent": ""
        },{
            "data": "sucursal_info",
            "defaultContent": ""
        },{
            "data": null,
            "render": function(data, type, row, meta) {

                var editar = 'onclick="editarInventario(' + data.cedula_info + ')"';
                
                var a = '<a type="button" class="" ' + editar + ' href="../vista/editarCliente.php?idUsuario='+data.cedula_info+'"><i class="text-success material-icons d-inline-block align-top">edit</i></a>';
                
                return a;
            }
        },{
            "data": null,
            "render": function(data, type, row, meta) {
                
                var eliminar = 'onclick="borrarCliente(' + data.cedula_info + ')"';

                var a = '<a type="button" class="" title="Borrar" ' + eliminar + '><i class="text-danger material-icons d-inline-block align-top">delete</i></a>';
                return a;
            }
        }]
    });
}

function mostrarInfo() {
    var id = $('#idUsuario').val();
    var boton = 'mostrarInfo';

    $.ajax({
        url: '../controlador/controladorCliente.php',
        cache: false,
        type: 'POST',
        data: { id, boton },
        success: function(Resp) {
            var obj = JSON.parse(Resp);

            if (Resp === '0') {
                toastr.info('No hay informacion!', {
                    "timeOut": "2000",
                    "closeButton": true
                })
               
            } else {
                             
            $('#cliente').val(obj.nombre_info);
            $('#cedula').val(obj.cedula_info);
            $('#sucursal').val(obj.sucursal_info);
            $('#fecha').val(obj.fecha_info);
            $('#contrato').val(obj.contrato_info);
            $('#correo').val(obj.correo_info);
            $('#rango').val(obj.rango_info);
            $('#director').val(obj.director_info);
            $('#gerente').val(obj.gerente_info);
            $('#supervisor').val(obj.supervisor_info);
            $('#asesor').val(obj.asesor_info);    
            
            }
        },

    });
}

function actualizarCliente() {

       
        var cliente = $('#cliente').val();
        var cedula = $('#cedula').val();
        var fecha = $('#fecha').val();
        var contrato = $('#contrato').val();
        var correo = $('#correo').val();
        var rango = $('#rango').val();
        var director = $('#director').val();
        var gerente = $('#gerente').val();
        var supervisor = $('#supervisor').val();
        var asesor = $('#asesor').val();
        var sucursal = $('#sucursal').val();

        var user = $('#user').val();
        var boton = 'actualizarCliente';

        $.ajax({
            url: '../controlador/controladorCliente.php',
            cache: false,
            type: 'POST',
            data: {  cliente, cedula, fecha, contrato, correo, rango, director, gerente, supervisor, asesor, sucursal, user, boton },
            success: function(Resp) {
                toastr.success(Resp, {
                        "timeOut": "2000",
                        "closeButton": true
                    })
            },

        });
  


}

function borrarCliente(id) {
    var result = confirm("Está seguro de Eliminar?");
    if (result) {
        var user = $('#user').val();
        var boton = 'borrarCliente'
        $.ajax({
            url: '../controlador/controladorCliente.php',
            type: 'POST',
            cache: false,
            data: { id, user, boton }
        }).done(function(Resp) {
            if (Resp === '1') {
                toastr.success('Se Borro Correctamente!', {
                    "timeOut": "2000",
                    "closeButton": true
                })
                mostrarCliente()
            } else {
                toastr.error('No se Efectuo Cambio!', {
                    "timeOut": "2000",
                    "closeButton": true
                })

            }
        });

    }
}