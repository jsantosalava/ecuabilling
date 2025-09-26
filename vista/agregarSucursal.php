<?php
session_start();
if ( isset( $_SESSION[ 'INGRESO' ] ) && $_SESSION[ 'INGRESO' ] == 'YES'  ) {
  ?>
    <!DOCTYPE html>
    <html lang="es-es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AGREGAR CAMPAÑA</title>

        <?php
    include("../includes/cdn.php"); 
    ?>

    </head>

    <body>
           <!-- Sidebar -->
    <div class="sidebar">
       
        <?php include("../includes/menu.php"); ?>
    </div>
            
            <input type="hidden" id="user" value="<?php echo  $_SESSION['user'];?>">

            <div class="container mt-4 pt-4">
                           
                            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-6">
                                <legend>INGRESAR SUCURSAL</legend>
                                <form action="" id="guardarCampania" class="mb-2">
                                    <div class="form-row">
                                       
                                        <div class="form-group col-md-12">
                                            <label for="nombreCampania">NOMBRE SUCURSAL</label>
                                            <input class="form-control" id="nombreCampania" type="text" placeholder="" required>
                                        </div>
                                        
                                        </div>
                                        
                                   
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </form>
                                    </div>
                                <div class="col-md-6">
                                    <ul class="list-group" class="mb-2">
                                        <legend>LISTA DE SUCURSALES</legend>
                                        <div id="mostrarCampania"></div>
                                    </ul>
                                </div>
                            </div>
                            </div>
                       
                    </div>
                    
                </div>
                        </div>
          
            </div>
    </body>
    <script src="../js/sucursal.js"></script>

    </html>
    <?php

} else {
  header( "location: login.html" );
}
?>