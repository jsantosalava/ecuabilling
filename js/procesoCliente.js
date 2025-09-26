$('#subirCsvCedula').click(function() {
    var files = $('#archivoCsvcedula')[0].files[0];
    subirCsv(files);
    $("#ejecutarCedula").prop("disabled", false);
    $("#subirCsvCedula").prop("disabled", true);
});

$('#subirCsvInfo').click(function() {
    var files = $('#archivoCsvInfo')[0].files[0];
    subirCsv(files);
    $("#ejecutarInfo").prop("disabled", false);
    $("#subirCsvInfo").prop("disabled", true);
});

$('#formCedula').submit(function(e) {
    e.preventDefault();
    var archivocvs = $('#archivoCsvcedula').val();
    subirCedula(archivocvs);
    $("#ejecutarCedula").prop("disabled", true);
    $("#subirCsvCedula").prop("disabled", false);
});

$('#formInfo').submit(function(e) {
    e.preventDefault();
    var archivocvs = $('#archivoCsvInfo').val();
    subirInfo(archivocvs);
    $("#ejecutarInfo").prop("disabled", true);
    $("#subirCsvInfo").prop("disabled", false);
});


function subirCedula(archivocvs) {
    // var archivocvs = $('#archivoCsvCedula').val();
    var a = archivocvs.lastIndexOf("\\");
    var b = archivocvs.length;
    var nombreArchivocsv = archivocvs.substring(a + 1, b);
    var boton = 'subirCedula'

    $.ajax({
        url: '../controlador/controladorSubirCliente.php',
        type: 'POST',
        data: { nombreArchivocsv, boton }
    }).done(function(respuesta) {
        if (respuesta == 1) {
            toastr.success('Se Subio Csv Correctamente..!', {
                "timeOut": "20000",
                "closeButton": true
            })
            
            var ruta = '../csv/'
            BorrarCsv(nombreArchivocsv,ruta);
        } else {
            toastr.warning('Revisar el CSV..!', {
                "timeOut": "90000",
                "closeButton": true
            })
            
            var ruta = '../csv/'
            BorrarCsv(nombreArchivocsv,ruta);
        }
    });
}

function subirInfo(archivocvs) {
    // var archivocvs = $('#archivoCsvInfo').val();
    var a = archivocvs.lastIndexOf("\\");
    var b = archivocvs.length;
    var nombreArchivocsv = archivocvs.substring(a + 1, b);
    var boton = 'subirInfo'

    $.ajax({
        url: '../controlador/controladorSubirCliente.php',
        type: 'POST',
        data: { nombreArchivocsv, boton }
    }).done(function(respuesta) {
        if (respuesta == 1) {
            toastr.success('Se Subio Información Correctamente..!', {
                "timeOut": "20000",
                "closeButton": true
            })
            var ruta = '../csv/'
            BorrarCsv(nombreArchivocsv,ruta);
            
        } else {
            toastr.warning('Revisar el CSV de la Información..!', {
                "timeOut": "90000",
                "closeButton": true
            })
            var ruta = '../csv/'
            BorrarCsv(nombreArchivocsv,ruta);
            
        }
    });
}