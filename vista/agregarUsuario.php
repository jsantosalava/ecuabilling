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
                            <div class="card">
                                
                                <div class="card-body">
                                    <form id="registrarUsuario" action="">
                                        <input type="hidden" id="idusuario">
                                        <h5 class="card-title"><i class="material-icons d-inline-block align-top">info</i>INFORMACION PERSONAL</h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                
                                                <label for="nombreUsuario">NOMBRES</label>
                                                <input class="form-control" id="nombreUsuario" type="text" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                
                                                <label for="apellidoUsuario">APELLIDOS</label>
                                                <input class="form-control" id="apellidoUsuario" type="text">
                                            </div>
                                            <div class="form-group col-md-4">
                                                
                                                <label for="cedulaUsuario"># CEDULA/RUC</label>
                                                <input class="form-control" id="cedulaUsuario" type="text">
                                            </div>
                                            

                                            </div>

                                           
                                            <h5 class="card-title"><i class="material-icons d-inline-block align-top">info</i>INFORMACION DE LA CUENTA</h5>
                                            <div class="form-row">
                                            <div class="form-group col-md-2">
                                                
                                                <label for="usuarioUs">USUARIO</label>
                                                <input class="form-control" id="usuarioUs" type="text" >
                                            </div>
                                            <div class="form-group col-md-2">
                                                
                                                <label for="extension">EXTENSION</label>
                                                <input class="form-control" id="extension" type="text" >
                                            </div>
                                            
                                            <div class="form-group col-md-2">
                                                
                                                <label for="rolUsuario">ROL</label>
                                                <select class="form-control" name="" id="rolUsuario" required>
                                                            <option selected disabled value="">Seleccionar</option>
                                                        </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                
                                                <label for="passUsuario">CONTRASEÑA</label>
                                                <input class="form-control" id="passUsuario" type="password" >
                                            </div>
                                            <div class="form-group col-md-3">
                                               
                                                <label for="repassUsuario">REPETIR CONTRASEÑA</label>
                                                <input class="form-control" id="repassUsuario" type="password" >
                                            </div>
                                            </div>
                                            
                                           
                                            
                                        <button class="btn btn-primary" id="registrar" type="submit">Registrar</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                       
                        
                        

                    </div>
                </div>

                    
                </div>
               
        </body>

        <script src="../js/usuario.js"></script>

        </html>
        <?php

} else {
  header( "location: login.html" );
}
?>