$(document).ready(function() {
    $(':input:visible:enabled:first').focus();
    mostrarUsuario();
    mostrarInfo()
   
    
    $.post("../includes/rol.php", function(data) {
        $("#rolUsuario").html(data);
        var rol = $('#rol1').val();
        $('#rolUsuario').val(rol);
    });

});

$('#registrarUsuario').submit(function(e) {
    e.preventDefault();
    agregarUsuario()
});

$('#editarUsuario').submit(function(e) {
    e.preventDefault();
    actualizarUsuario()
});

function agregarUsuario() {

    var passUsuario = $('#passUsuario').val();
    var repassUsuario = $('#repassUsuario').val();

    if (passUsuario === repassUsuario) {
        var nombreUsuario = $('#nombreUsuario').val();
        var apellidoUsuario = $('#apellidoUsuario').val();
        var cedulaUsuario = $('#cedulaUsuario').val();
        var extension = $('#extension').val();
        var usuarioUs = $('#usuarioUs').val();
        
        var rolUsuario = $('#rolUsuario').val();
       
        
        var user = $('#user').val();
        var boton = 'agregarUsuario'
        $.ajax({
            url: '../controlador/controladorUsuario.php',
            cache: false,
            type: 'POST',
            data: {nombreUsuario, apellidoUsuario, cedulaUsuario, usuarioUs, extension, rolUsuario, passUsuario, user, boton },
            success: function(Resp) {
                toastr.success(Resp, {
                        "timeOut": "2000",
                        "closeButton": true
                    })
                    // $("#nombreUsuario")[0].reset();
                    $( '#nombreUsuario' ).val( "" );
                    $( '#apellidoUsuario' ).val( "" );
                    $( '#cedulaUsuario' ).val( "" );
                    
                    $( '#usuarioUs' ).val( "" );
                    $( '#extension' ).val( "" );
                    
                    $( '#passUsuario' ).val( "" );
                    $( '#repassUsuario' ).val( "" );
                    
                    $(':input:visible:enabled:first').focus();

            },

        });
    } else {
        toastr.error('No Coinciden Contraseñas', {
            "timeOut": "2000",
            "closeButton": true
        })
    }

}

function mostrarUsuario() {
    $.fn.dataTable.ext.errMode = 'throw';
    
    boton = "mostrarUsuario";
    var table = $('#tablaUsuario').DataTable({
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
            "url": "../controlador/controladorUsuario.php",
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
            "data": "cedula_agente",
            "defaultContent": ""
        }, {
            "data": "nombres",
            "defaultContent": ""
        },{
            "data": "extension_agente",
            "defaultContent": ""
        },{
            "data": "usuario_agente",
            "defaultContent": ""
        },{
            "data": "nombre_rol",
            "defaultContent": ""
        },{
            "data": null,
            "render": function(data, type, row, meta) {

                var editar = 'onclick="editarInventario(' + data.idagente + ')"';
                
                var a = '<a type="button" class="" ' + editar + ' href="../vista/editarUsuario.php?idUsuario='+data.idagente+'"><i class="text-success material-icons d-inline-block align-top">edit</i></a>';
                
                return a;
            }
        },{
            "data": null,
            "render": function(data, type, row, meta) {
                
                var eliminar = 'onclick="borrarUsuario(' + data.idagente + ')"';

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
        url: '../controlador/controladorUsuario.php',
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
                             
            $('#nombreUsuario').val(obj.nombre_agente);
            $('#apellidoUsuario').val(obj.apellido_agente);
            $('#cedulaUsuario').val(obj.cedula_agente);
           
            $('#usuarioUs').val(obj.usuario_agente);
            $('#extension').val(obj.extension_agente);
            
           $.post("../includes/rol.php", function(data) {
        $("#rolUsuario").html(data);
        $('#rolUsuario').val(obj.rol_agente);
    });
            $('#rolUsuario').val(obj.rol_agente);
            
            
                
            }
        },

    });
}

function actualizarUsuario() {
    var passUsuario = $('#passUsuario').val();
    var repassUsuario = $('#repassUsuario').val();

    if (passUsuario === repassUsuario) {

        var id = $('#idUsuario').val();
        var nombreUsuario = $('#nombreUsuario').val();
        var apellidoUsuario = $('#apellidoUsuario').val();
        var cedulaUsuario = $('#cedulaUsuario').val();
        
        var extension = $('#extension').val();
        var usuarioUs = $('#usuarioUs').val();
       
        var rolUsuario = $('#rolUsuario').val();
        
        var user = $('#user').val();
        var boton = 'actualizarUsuario';

        $.ajax({
            url: '../controlador/controladorUsuario.php',
            cache: false,
            type: 'POST',
            data: { id, nombreUsuario, apellidoUsuario, cedulaUsuario,  
                usuarioUs,  rolUsuario, passUsuario,extension,  user, boton },
            success: function(Resp) {
                toastr.success(Resp, {
                        "timeOut": "2000",
                        "closeButton": true
                    })
            },

        });
    } else {
        toastr.error('No Coinciden Contraseñas', {
            "timeOut": "2000",
            "closeButton": true
        })
    }


}

function borrarUsuario(id) {
    var result = confirm("Está seguro de Eliminar El Usuario?");
    if (result) {
        var user = $('#user').val();
        var boton = 'borrarUsuario'
        $.ajax({
            url: '../controlador/controladorUsuario.php',
            type: 'POST',
            cache: false,
            data: { id, user, boton }
        }).done(function(Resp) {
            if (Resp === '1') {
                toastr.success('Se Borro Correctamente!', {
                    "timeOut": "2000",
                    "closeButton": true
                })
                mostrarUsuario()
            } else {
                toastr.error('No se Efectuo Cambio!', {
                    "timeOut": "2000",
                    "closeButton": true
                })

            }
        });

    }
}