$(document).ready(function() {
    $(':input:visible:enabled:first').focus();
    mostrarReporteGestion();


});

$('#buscar').submit(function(e) {
    e.preventDefault();
    mostrarReporteGestion()
});


function mostrarReporteGestion() {
    $.fn.dataTable.ext.errMode = 'throw';
    var fecha_inicio = $('#fecha_inicio').val();
    var fecha_fin = $('#fecha_fin').val();
    boton = "mostrarReporteGestion";
    var table = $('#tablaGestion').DataTable({
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
            "url": "../controlador/controladorReporteGestion.php",
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
            title: 'REPORTE'+fecha_inicio+'hasta'+fecha_fin
        }],

	
        "columns": [{
            "data": "cedula_cliente",
            "defaultContent": ""
        },{
            "data": "nombre_info",
            "defaultContent": ""
        }, {
            "data": "celular_gestion",
            "defaultContent": ""
        },{
            "data": "nombre_campania",
            "defaultContent": ""
        },{
            "data": "nombre_contactabilidad",
            "defaultContent": ""
        },{
            "data": "nombre_segcalltype",
            "defaultContent": ""
        },{
            "data": "nombre_calltype",
            "defaultContent": ""
        },{
            "data": "nombre_motivo",
            "defaultContent": ""
        },{
            "data": "fechaPago_gestion",
            "defaultContent": ""
        },{
            "data": "calificacion_gestion",
            "defaultContent": ""
        },{
            "data": "valorPago_gestion",
            "defaultContent": ""
        },{
            "data": "tipocliente_gestion",
            "defaultContent": ""
        },{
            "data": "evento_gestion",
            "defaultContent": ""
        },{
            "data": "observacion_gestion",
            "defaultContent": ""
        },{
            "data": "asesor_gestion",
            "defaultContent": ""
        },{
            "data": "nombre",
            "defaultContent": ""
        },{
            "data": "tiempogestion_gestion",
            "defaultContent": ""
        },{
            "data": "contrato_cliente",
            "defaultContent": ""
        },{
            "data": "fechaCreacion_gestion",
            "defaultContent": ""
        }]
    });
}