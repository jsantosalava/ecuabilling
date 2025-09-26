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
            <title>EDITAR USUARIO</title>

            <?php
    include("../includes/cdn.php"); 
    ?>
        </head>

        <body>
            <?php
    include("../includes/menu.php"); 
    $id = $_GET[ 'idUsuario' ];
    ?>
    			<input type="hidden" id="idUsuario" value="<?php echo $id;?>">
                <input type="hidden" id="rol" value="<?php echo  $_SESSION['rol'];?>">
                
                <input type="hidden" id="user" value="<?php echo  $_SESSION['user'];?>">
                <div class="container mt-2 pt-2">

                    <div class="row">
                    <div class="col-sm-12">
                        
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active d-flex align-items-center h4" href="agregarCliente.php" role="button"><i class="material-icons ">face</i> NUEVO CLIENTE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  d-flex align-items-center h4" href="listaCliente.php" role="button"><i class="material-icons">format_list_bulleted</i> LISTA DE CLIENTES</a>
                                </li>
                            </ul>
                             </div>
                                </div>
                            <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                
                                <div class="card-body">
                                    <form id="editarCliente" action="">
                                        <input type="hidden" id="idusuario">
                                        <h5 class="card-title"><i class="material-icons d-inline-block align-top">info</i>INFORMACION PERSONAL</h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                
                                                <label for="cliente">CLIENTE</label>
                                                <input class="form-control" id="cliente" type="text" required>
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                                
                                                <label for="cedula"># CEDULA/RUC</label>
                                                <input class="form-control" id="cedula" type="text" disabled="" required>
                                            </div>
                                            
                                             <div class="form-group col-md-4">
                                                
                                                <label for="sucursal">SUCURSAL</label>
                                                <input class="form-control" id="sucursal" type="text" required>
                                            </div>

                                            </div>

                                           
                                            <h5 class="card-title"><i class="material-icons d-inline-block align-top">info</i>INFORMACION DE LA CUENTA</h5>
                                            <div class="form-row">
                                            <div class="form-group col-md-2">
                                                
                                                <label for="fecha">FECHA</label>
                                                <input class="form-control" id="fecha" type="date" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                
                                                <label for="contrato"># CONTRATO</label>
                                                <input class="form-control" id="contrato" type="text" required>
                                            </div>
                                            
                                            <div class="form-group col-md-3">
                                                	<label for="correo">CORREO</label>
                                                	<input class="form-control" id="correo" type="mail" >
                                            	</div>
                                            <div class="form-group col-md-3">
                                                
                                                <label for="rango">RANGO</label>
                                                <input class="form-control" id="rango" type="text" >
                                            </div>
                                            

                                            </div>
                                            <div class="form-row">
                                            	<div class="form-group col-md-3">
                                                	<label for="director">DIRECTOR</label>
                                                	<input class="form-control" id="director" type="text" >
                                            	</div>
                                            	<div class="form-group col-md-3">
                                                	<label for="gerente">GERENTE</label>
                                                	<input class="form-control" id="gerente" type="text" >
                                            	</div>
                                            	<div class="form-group col-md-3">
                                                	<label for="supervisor">SUPERVISOR</label>
                                                	<input class="form-control" id="supervisor" type="text" >
                                            	</div>
                                            	<div class="form-group col-md-3">
                                                	<label for="asesor">ASESOR</label>
                                                	<input class="form-control" id="asesor" type="text" >
                                            	</div>
                                            </div>
                                            
                                           
                                            
                                        <button class="btn btn-primary" id="registrar" type="submit">Actualizar</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                       
                        
                        

                 
               

                    
                </div>
               
        </body>

        <script src="../js/cliente.js"></script>

        </html>
        <?php

} else {
  header( "location: login.html" );
}
?>