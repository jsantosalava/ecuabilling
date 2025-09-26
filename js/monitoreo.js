$(document).ready(function() {
    $(':input:visible:enabled:first').focus();
    mostrarMonitoreo();
  
   
    
    $.post("../includes/asesores.php", function(data) {
        $("#asesor").html(data);
      
    });

});


$('#buscar').submit(function(e) {
    e.preventDefault();
    mostrarMonitoreo()
});

function mostrarMonitoreo() {
    $.fn.dataTable.ext.errMode = 'throw';

    var fecha_inicio = $('#fecha_inicio').val();
    var fecha_fin = $('#fecha_fin').val();
    var asesor = $('#asesor').val();

    boton = "mostrarMonitoreo";
    var table = $('#tabla_monitoreo').DataTable({
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
            "url": "../controlador/controladorMonitoreo.php",
            "type": "POST",
            "dataType": "json",
            "serverSide": true,
            "data": {  boton,fecha_inicio,fecha_fin,asesor },
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
            "data": "fechaCreacion_gestion",
            "defaultContent": ""
        }, {
            "data": "cedula_cliente",
            "defaultContent": ""
        },{
            "data": "nombre_calltype",
            "defaultContent": ""
        },{
            "data": "observacion_gestion",
            "defaultContent": ""
        },{
            "data": "celular_gestion",
            "defaultContent": ""
        },{
            "data": null,
            "render": function(data, type, row, meta) {

                ad = data.rutaAudio_gestion;
                audio = ad.substr(19);
                
                var a = '<audio id="audio_d" src="http://192.168.12.229/reportes/audios'+audio+'" controls ></audio><a type="button" href="http://192.168.12.229/reportes/audios'+audio+'"  title="Descargar" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>';
                
                return a;
            }
        }]
    });
}