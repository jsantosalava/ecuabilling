$('#ingresar').submit(function(e) {
    e.preventDefault();
    ingresar()
});


function ingresar() {
    var usuario = $('#usuario').val();
    var password = $('#password').val();
    var boton = 'ingresarUsuario';

    $.ajax({
        url: '../controlador/appControllers.php',
        cache: false,
        type: 'POST',
        data: { usuario, password, boton },
        success: function(Resp) {

            if (Resp === '1') {
                location.href = 'index.php';
            } else {
                toastr.error(Resp, {
                    "timeOut": "2000",
                    "closeButton": true
                })
               
            }

        },

    });
}


function cerrar() {
    $.ajax({
        url: '../controlador/appControllers.php',
        type: 'POST',
        data: "boton=cerrar"
    }).done(function(resp) {

        location.href = 'login.html';
    });
}