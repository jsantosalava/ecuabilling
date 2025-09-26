function BorrarCsv(archivo, ruta) {
    $.ajax({
        url: '../procesoPhp/borrarArchivo.php',
        type: 'post',
        data: {
            archivo,
            ruta
        }
    }).done(function() {
        toastr.success('Se Borro..!', {
            "timeOut": "2000",
            "closeButton": true
        })
        setTimeout(function() {
            location.reload();
        }, 2000);
        
    }).fail(function() {
        toastr.error('Error..!', {
            "timeOut": "90000",
            "closeButton": true
        })
        setTimeout(function() {
            location.reload();
        }, 9000);
    });
}