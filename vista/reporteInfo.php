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
            <title>Reporte Información Cliente</title>

            <?php
    include("../includes/cdn.php"); 
    ?>
        </head>

        <body>
            <?php
    include("../includes/menu.php"); 
    ?>
    <?php

						$fechaInicial = date( 'Y-m-d' );

						$fechaFinal = date( 'Y-m-d', strtotime( "$fechaInicial + 1 day" ) );
						?>
               
                <input type="hidden" id="user" value="<?php echo  $_SESSION['user'];?>">
                <div class="container-fluid mt-2 pt-2">

                	<h3 class="text-center">Reporte Información Cliente</h3>
			<div class="row p-2">
				<div class="col-md-12">
					<form action="" id="buscar">
					<div class="form-row">
						
					    <div class="form-group col-md-4">
					      	<label for="fecha_inicio">Fecha Inicio</label>
					     	<input class='form-control' type="date" id="fecha_inicio" name="fecha_inicio" var value="<?php echo $fechaInicial;?>" required>
					    </div>
					    <div class="form-group col-md-4">
					    	<label for="fecha_fin">Fecha Final</label>
					      	<input class='form-control' type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fechaFinal;?>" required>
					    </div>
					</div>
						
					<button type="submit" class="btn btn-primary">Buscar</button>
					
				</form>
				</div>
				
    		</div>

                    <div class="row">

                    <div class="col-sm-12">
                            <div class="row">
                        <div class="col-sm-12">
                            <legend>Usuarios</legend>
                            <div class="table-responsive">
                                <table id="tablaCliente" class="table text-center table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">CEDULA</th>
                                            <th scope="col">CLIENTE</th>
                                            <th scope="col">FECHA</th>
                                            <th scope="col">MES</th>
                                            <th scope="col">CORREO</th>
                                            <th scope="col">CONTRATO</th>
                                            <th scope="col">RANGO</th>
                                            <th scope="col">DIRECTOR</th>
                                            <th scope="col">GERENTE</th>
                                            <th scope="col">SUPERVISOR</th>
                                            <th scope="col">ASESOR</th>
                                            <th scope="col">SUCURSAL</th>
                                           
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

        <script src="../js/reporteInfo.js"></script>
       
        </html>
        <?php

} else {
  header( "location: login.html" );
}
?>