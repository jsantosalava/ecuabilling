$(document).ready(function() {
    $(':input:visible:enabled:first').focus();
    mostrarReporteInfo();


});

$('#buscar').submit(function(e) {
    e.preventDefault();
    mostrarReporteInfo()
});


function mostrarReporteInfo() {
    $.fn.dataTable.ext.errMode = 'throw';
    var fecha_inicio = $('#fecha_inicio').val();
    var fecha_fin = $('#fecha_fin').val();
    boton = "mostrarReporteInfo";
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
            "url": "../controlador/controladorReporteInfo.php",
            "type": "POST",
            "dataType": "json",
            "serverSide": true,
            "data": {  boton,fecha_inicio,fecha_fin },
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
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            autoFilter: true,
            sheetName: 'HISTORIAL',
            title: 'REPORTE Cliente'+fecha_inicio+'hasta'+fecha_fin
        }],
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
        }]
    });
}