$('#infoCliente').submit(function(e) {
    e.preventDefault();
    mostrarTelefono()
    mostrarInfo()
    mostrarHistorial()

    
});

$(document).ready(function() {
  
  
   
    $('#tablaHistorial').DataTable({
});  

    mostrarSpeech()
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
                    $('#segCalltype').find('option').remove().end().append('<option value="0"></option>').val('SELECCIONAR');       
                        //html="<label>seleccionar  : </label><select class='form-control' name='nivel2' id='nivel2'></select>";
                        //$("#select_n2").html(html);                   
                    $("#contactabilidad option:selected").each(function () {
                        idnivel1_select = $(this).val();
                        $.post("../includes/segcalltype.php", { idnivel1_select: idnivel1_select }, function(data){
                            $("#segCalltype").html(data);
                        });            
                    });
                })

    $("#segCalltype").change(function () {
                    $('#callType').find('option').remove().end().append('<option value="0"></option>').val('SELECCIONAR');       
                        //html="<label>seleccionar  : </label><select class='form-control' name='nivel2' id='nivel2'></select>";
                        //$("#select_n2").html(html);                   
                    $("#segCalltype option:selected").each(function () {
                        idnivel1_select = $(this).val();
                        $.post("../includes/calltype.php", { idnivel1_select: idnivel1_select }, function(data){
                            $("#callType").html(data);
                        });            
                    });
                })


    $.post("../includes/motivo.php", function(data) {
        $("#motivo").html(data);
        
    });

});

$('#guardarGestion').submit(function(e) {
    e.preventDefault();
    agregarGestion()
});

function mostrarSpeech() {
    
    var boton = 'mostrarSpeech';

    $.ajax({
        url: '../controlador/controladorGestion.php',
        cache: false,
        type: 'POST',
        data: {  boton },
        success: function(Resp) {
            

            if (Resp === '0') {
                toastr.info('No hay informacion!', {
                    "timeOut": "2000",
                    "closeButton": true
                })
               
            } else {
                             
            var speech = eval(Resp);

            var bbienvenida = "<a class='btn btn-primary' data-bs-toggle='collapse' href='#collapseExample1' role='button' aria-expanded='false' aria-controls='collapseExample1'>"+speech[0][0]+"</a>";
            var bcobranza = "<butt on class='btn btn-primary' type='button' data-bs-toggle='collapse' data-bs-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>"+speech[1][0]+"</button>";

            var bienvenida = "<div class='collapse' id='collapseExample1'><div class='card card-body'>"+speech[0][1]+"</div></div>"
            var cobranza = "<div class='collapse' id='collapseExample'><div class='card card-body'>"+speech[1][1]+"</div></div>"
            $("#botonBienvenida").html(bbienvenida);
            $("#botonCobranza").html(bcobranza);
            $("#speechBienvenida").html(bienvenida);
            $("#speechCobranza").html(cobranza);
            
            
            
            }
        },

    });
}

function mostrarInfo() {
    var id = $('#cedulaCliente').val();
    var boton = 'mostrarInfo';

    $.ajax({
        url: '../controlador/controladorGestion.php',
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
                             
            $('#nombreCliente').val(obj.nombre_info);
            $('#cedCliente').val(obj.cedula_info);
            $('#contratoCliente').val(obj.contrato_info);
            $('#sucursalCliente').val(obj.nombre_sucursal);
            $('#correoCliente').val(obj.correo_info);
            $('#directorCliente').val(obj.director_info);
            $('#gerenteCliente').val(obj.gerente_info);
            $('#supervisorCliente').val(obj.supervisor_info);
            $('#asesorCliente').val(obj.asesor_info);
            $('#rangoCliente').val(obj.rango_info);
            $('#fechaCliente').val(obj.fecha_info);
            $('#mesCliente').val(obj.mes_info);
            
            }
        },

    });
}

function agregarGestion() {

    var tipo_llamada = $('#tipo_llamada').val();
    var celularGestion = $('#celularGestion').val();
    var cedCliente = $('#cedCliente').val();
    var campania = $('#campania').val();
    var contactabilidad = $('#contactabilidad').val();
    var segCalltype = $('#segCalltype').val();
    var callType = $('#callType').val();


    var motivo = $('#motivo').val();
    if(motivo == 0){
        motivo = "0";
    }else{
        motivo = $('#motivo').val();
    }

    var fechaGestion = $('#fechaGestion').val();
        if(fechaGestion == ""){
        fechaGestion = "0000-00-00";
    }else{
        fechaGestion = $('#fechaGestion').val();
    }
    var calificacionGestion = $('#calificacionGestion').val();
    var valorPagar = $('#valorPagar').val();
    if(valorPagar == ""){
        valorPagar = "0";
    }else{
        valorPagar = $('#valorPagar').val();
    }
    var tipoCliente = $('#tipoCliente').val();
    if(tipoCliente == ""){
        tipoCliente = "NA";
    }else{
        tipoCliente = $('#tipoCliente').val();
    }
    var evento = $('#evento').val();
    var comentario = $('#comentario').val();
    if(comentario == ""){
        comentario = "NA";
    }else{
        comentario = $('#comentario').val();
    }
    var extension = $('#extension').val();
    var callid = $('#callid').val();
    var contratoGestion = $('#contratoGestion').val();
    if(contratoGestion == ""){
        contratoGestion = "0";
    }else{
        contratoGestion = $('#contratoGestion').val();
    }
    
    var user = $('#extension').val();
    var boton = 'agregarGestion'

    $.ajax({
        url: '../controlador/controladorGestion.php',
        cache: false,
        type: 'POST',
        data: { tipo_llamada, celularGestion,cedCliente,campania,contactabilidad,segCalltype,callType,motivo,fechaGestion,calificacionGestion,
        valorPagar,tipoCliente,evento,comentario, boton ,extension,user,callid,contratoGestion},
        success: function(Resp) {
            toastr.success(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
                $("#guardarGestion")[0].reset();
                // mostrarMotivo()
                mostrarHistorial()
                var tipo_llamada = $('#tipo_llamada').val();
                if(tipo_llamada == 1){
                    window.close();
                }
                
        },

    });
}


function mostrarHistorial() {
    $.fn.dataTable.ext.errMode = 'throw';
    var id = $('#cedulaCliente').val();
    boton = "mostrarHistorial";
    var table = $('#tablaHistorial').DataTable({
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
            "url": "../controlador/controladorGestion.php",
            "type": "POST",
            "dataType": "json",
            "serverSide": true,
            "data": {  boton,id },
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
            "data": "asesor",
            "defaultContent": ""
        }, {
            "data": "fechaCreacion_gestion",
            "defaultContent": ""
        },{
            "data": "celular_gestion",
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
            "data": "contrato_cliente",
            "defaultContent": ""
        },{
            "data": "observacion_gestion",
            "defaultContent": ""
        },{
            "data": "nombre_segcalltype",
            "defaultContent": ""
        },{
            "data": "nombre_calltype",
            "defaultContent": ""
        },{
            "data": "fechaPago_gestion",
            "defaultContent": ""
        }]
    });
}
