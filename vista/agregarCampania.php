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
        <?php
    include("../includes/menu.php"); 
    ?>
           
            
            <input type="hidden" id="user" value="<?php echo  $_SESSION['user'];?>">

            <div class="container mt-4 pt-4">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link  d-flex align-items-center h4" href="agregarCampania.php" role="button"><i class="material-icons">format_list_bulleted</i>CAMPAÑA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex align-items-center h4" href="agregarContactabilidad.php" role="button"><i class="material-icons ">format_list_bulleted</i>CONTACTABILIDAD</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  d-flex align-items-center h4" href="agregarSegCalltype.php" role="button"><i class="material-icons">format_list_bulleted</i>SEG CALLTYPE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  d-flex align-items-center h4" href="agregarCalltype.php" role="button"><i class="material-icons">format_list_bulleted</i>CALLTYPE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  d-flex align-items-center h4" href="agregarMotivo.php" role="button"><i class="material-icons">format_list_bulleted</i>MOTIVO DE ATRASO</a>
                                </li>
                                
                            </ul> 
                            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-6">
                                <legend>INGRESAR CAMPAÑA</legend>
                                <form action="" id="guardarCampania" class="mb-2">
                                    <div class="form-row">
                                       
                                        <div class="form-group col-md-12">
                                            <label for="nombreCampania">NOMBRE CAMPAÑA</label>
                                            <input class="form-control" id="nombreCampania" type="text" placeholder="" required>
                                        </div>
                                        
                                        </div>
                                        
                                   
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </form>
                                    </div>
                                <div class="col-md-6">
                                    <ul class="list-group" class="mb-2">
                                        <legend>LISTA DE SERVICIOS</legend>
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
    <script src="../js/campania.js"></script>

    </html>
    <?php

} else {
  header( "location: login.html" );
}
?>