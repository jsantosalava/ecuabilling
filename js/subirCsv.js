function subirCsv(files) {
    var formData = new FormData();
    // var files = $('#archivoCsv')[0].files[0];
    formData.append('file', files);
    $.ajax({
        url: '../procesoPhp/subirArchivo.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response === '0') {
                toastr["info"]("Ningún Archivo Seleccionado..!");
                
                $("#ejecutarCedula").prop("disabled", true);
                $("#subirCsvCedula").prop("disabled", false);
                $("#ejecutarInfo").prop("disabled", true);
                $("#subirCsvInfo").prop("disabled", false);

            } else if (response === '1') {
                toastr.error('Error Archivo..!', {
                    
                })
                $("#ejecutarCedula").prop("disabled", true);
                $("#subirCsvCedula").prop("disabled", false);
                $("#ejecutarInfo").prop("disabled", true);
                $("#subirCsvInfo").prop("disabled", false);

            } else if (response === '2') {
                toastr.warning('Ya existe el Archivo..!', {
                   
                })
                $("#ejecutarCedula").prop("disabled", true);
                $("#subirCsvCedula").prop("disabled", false);
                $("#ejecutarInfo").prop("disabled", true);
                $("#subirCsvInfo").prop("disabled", false);

            } else if (response === '3') {
                toastr.success('Se subió el archivo correctamente..!', {
                   
                })
            }
        }
    });
}