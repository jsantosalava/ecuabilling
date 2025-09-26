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
            <title>LISTA DE USUARIOS</title>

            <?php
    include("../includes/cdn.php"); 
    ?>
        </head>

        <body>
            <?php
    include("../includes/menu.php"); 
    ?>
                <input type="hidden" id="rol" value="<?php echo  $_SESSION['rol'];?>">
                
                <input type="hidden" id="user" value="<?php echo  $_SESSION['user'];?>">
                <div class="container mt-2 pt-2">

                    <div class="row">
                    <div class="col-sm-12">
                      
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active d-flex align-items-center h4" href="agregarUsuario.php" role="button"><i class="material-icons ">face</i> NUEVO USUARIO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  d-flex align-items-center h4" href="listaUsuario.php" role="button"><i class="material-icons">format_list_bulleted</i> LISTA DE USUARIOS</a>
                                </li>
                            </ul>
                            <div class="row">
                        <div class="col-sm-12">
                            <legend>Usuarios</legend>
                            <div class="table-responsive">
                                <table id="tablaUsuario" class="table text-center table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">CEDULA</th>
                                            <th scope="col">NOMBRES</th>
                                            <th scope="col">EXTENSION</th>
                                            <th scope="col">USUARIO</th>
                                            <th scope="col">ROL</th>
                                            <th scope="col">ACTUALIZAR</th>
                                            <th scope="col">ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     
                        
                        

                    </div>
                </div>

                    
                </div>
          

                <!-- Button trigger modal -->

        </body>

        <script src="../js/usuario.js"></script>
        <script src="../js/vehiculo.js"></script>
        <script src="../js/recarga.js"></script>

        </html>
        <?php

} else {
  header( "location: login.html" );
}
?>