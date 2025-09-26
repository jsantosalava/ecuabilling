$(document).ready(function() {
    $(':input:visible:enabled:first').focus();
    mostrarTelefono();
    mostrarInfo()

});

$('#agregarTelefono').submit(function(e) {
    e.preventDefault();
    agregarTelefono()
});

$('#editarCliente').submit(function(e) {
    e.preventDefault();
    actualizarCliente()
});

$('#actualizarNumero').click(function() {
    actualizarTelefono();
});

function agregarTelefono() {

        
        var cedula = $('#cedulaCliente').val();
        var numeroTelefono = $('#numeroTelefono').val();
        var contactoTelefono = $('#contactoTelefono').val();
        var propietarioTelefono = $('#propietarioTelefono').val();
        var nombreTelefono = $('#nombreTelefono').val();
        
        var user = $('#extension').val();
        var boton = 'agregarTelefono'

        $.ajax({
            url: '../controlador/controladorTelefono.php',
            cache: false,
            type: 'POST',
            data: {cedula, numeroTelefono, contactoTelefono, propietarioTelefono, nombreTelefono, user, boton},
            
            error:function(){
                alert('error')
            },
            success: function(Resp) {
                toastr.success(Resp, {
                        "timeOut": "2000",
                        "closeButton": true
                    })
                    mostrarTelefono()
                    $("#agregarTelefono")[0].reset();
                    $(':input:visible:enabled:first').focus();

            },
            

        });
    

}

function mostrarTelefono() {
    $.fn.dataTable.ext.errMode = 'throw';
    var cedula = $('#cedulaCliente').val();
    boton = "mostrarTelefono";
    var table = $('#tablaTelefono').DataTable({
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
            "url": "../controlador/controladorTelefono.php",
            "type": "POST",
            "dataType": "json",
            "serverSide": true,
            "data": {  boton ,cedula},
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
            "data": null,
            "render": function(data, type, row, meta) {

                var editar = 'onclick="editartelefono(' + data.idtelefono + ',\'' + data.numero_telefono + '\',\'' + data.contacto_telefono + '\',\'' + data.propietario_telefono + '\',\'' + data.nombre_telefono + '\',)"';
                var eliminar = 'onclick="borrarTelefono(' + data.idtelefono + ')"';
                var llamar = 'onclick="obtenerLlamar(' + data.numero_telefono + ')"';
                var a = '<a type="button" class="" title="editar" ' + editar + ' ><i class="text-success material-icons d-inline-block align-top">edit</i></a><a type="button" class="" title="Llamar" ' + llamar + '><i class="text-warning material-icons d-inline-block align-top">phone</i></a><a type="button" class="" title="Llamar" ' + eliminar + '><i class="text-danger material-icons d-inline-block align-top">delete</i></a>';
                
                return a;
            }
        },{
            "data": "numero_telefono",
            "defaultContent": ""
        },{
            "data": "contacto_telefono",
            "defaultContent": ""
        }, {
            "data": "propietario_telefono",
            "defaultContent": ""
        },{
            "data": "nombre_telefono",
            "defaultContent": ""
        }]
    });
}

function editartelefono(id,numero,contacto,propietario,nombre) {
   
            $('#idTelefono').val(id);
            $('#numeroTelefono').val(numero);
            $('#contactoTelefono').val(contacto);
            $('#propietarioTelefono').val(propietario);
            $('#nombreTelefono').val(nombre);

}

function obtenerLlamar(numero) {
   
    location.href = 'tel:0' + numero;
    $('#celularGestion').val('0'+numero);
}

function actualizarTelefono() {

       
        var idTelefono = $('#idTelefono').val();
       
        var numeroTelefono = $('#numeroTelefono').val();
        var contactoTelefono = $('#contactoTelefono').val();
        var propietarioTelefono = $('#propietarioTelefono').val();
        var nombreTelefono = $('#nombreTelefono').val();
        

        var user = $('#user').val();
        var boton = 'actualizarTelefono';

        $.ajax({
            url: '../controlador/controladorTelefono.php',
            cache: false,
            type: 'POST',
            data: {  idTelefono,  numeroTelefono, contactoTelefono, propietarioTelefono, nombreTelefono, user, boton },
            success: function(Resp) {
                toastr.success(Resp, {
                        "timeOut": "2000",
                        "closeButton": true
                    })

                mostrarTelefono()
            },

        });
  


}

function borrarTelefono(id) {
    var result = confirm("Está seguro de Eliminar?");
    if (result) {
        var user = $('#user').val();
        var boton = 'borrarTelefono'
        $.ajax({
            url: '../controlador/controladorTelefono.php',
            type: 'POST',
            cache: false,
            data: { id, user, boton }
        }).done(function(Resp) {
            if (Resp === '1') {
                toastr.success('Se Borro Correctamente!', {
                    "timeOut": "2000",
                    "closeButton": true
                })
                mostrarTelefono()
            } else {
                toastr.error('No se Efectuo Cambio!', {
                    "timeOut": "2000",
                    "closeButton": true
                })

            }
        });

    }
}