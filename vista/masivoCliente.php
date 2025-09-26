<?php
session_start();
if ( isset( $_SESSION[ 'INGRESO' ] ) && $_SESSION[ 'INGRESO' ] == 'YES' ) {


    ?>

        <!DOCTYPE html>
        <html lang="es-es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>NUEVO USUARIO</title>

            <?php
    include("../includes/cdn.php"); 
    ?>
        </head>

        <body>
            <?php
    include("../includes/menu.php"); 
    date_default_timezone_set('America/Guayaquil');
   $fecha = date( 'Y-m-d');
    ?>
               
                <input type="hidden" id="user" value="<?php echo  $_SESSION['user'];?>">
                 <div class="container  mt-5 pt-4">
            <h1 class="text-center">Masivo Cliente</h1>
            <div class="row  mb-2">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="">Subir CSV</h5>
                            <a href="../media/plantillas/comandato/plantillaInformacion.xlsx">Descargar Plantilla</a>
                        </div>
                        <div class="card-body">
                            <form action="" id="formCedula">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="archivo">Elegir Archivo</label>
                                        <input type="file" id="archivoCsvcedula" name="archivoCsvcedula" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary" title="subir" id="subirCsvCedula" type="button"><img src="../media/img/subir.png" alt="Logo IvrJACS" class="d-inline-block align-top" width="30" height="30"></button>
                                <button class="btn btn-success" title="ejecutar" id="ejecutarCedula" type="submit" disabled><img src="../media/img/base-de-datos1.png" alt="Logo IvrJACS" class="d-inline-block align-top" width="30" height="30"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="">Log Errores</h5>
                            
                        </div>
                        <div class="card-body">
                            <?php 
                            include("../includes/opendir.php");
                            //Llamamos a la función y le pasamos el nombre de nuestro directorio.
                            listFiles("../log/cliente/");
                                ?>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        <script src="../js/subirCsv.js"></script>
        <script src="../js/borrarCsv.js"></script>
        <script src="../js/procesoCliente.js"></script>
               
        </body>

        <script src="../js/usuario.js"></script>

        </html>
        <?php

} else {
  header( "location: login.html" );
}
?>