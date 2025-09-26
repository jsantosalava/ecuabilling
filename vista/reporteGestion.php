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
            <title>Reporte Gestion</title>

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

                	<h3 class="text-center">Reporte Gestion</h3>
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
                            
                            <div class="table-responsive">
                                <table id="tablaGestion" class="table text-center table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">cedula_cliente</th>
                                            <th scope="col">nombre_info</th>
                                            <th scope="col">celular_gestion</th>
                                            <th scope="col">nombre_campania</th>
                                            <th scope="col">nombre_contactabilidad</th>
                                            <th scope="col">nombre_segcalltype</th>
                                            <th scope="col">nombre_calltype</th>
                                            <th scope="col">nombre_motivo</th>
                                            <th scope="col">fechaPago_gestion</th>
                                            <th scope="col">calificacion_gestion</th>
                                            <th scope="col">valorPago_gestion</th>
                                            <th scope="col">tipocliente_gestion</th>
                                            <th scope="col">evento_gestion</th>
                                            <th scope="col">observacion_gestion</th>
                                            <th scope="col">asesor_gestion</th>
                                            <th scope="col">nombre asesor</th>
                                            <th scope="col">tiempogestion_gestion</th>
                                            <th scope="col">contrato_cliente</th>
                                            <th scope="col">fechaCreacion_gestion</th>

                                           
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

        <script src="../js/reporteGestion.js"></script>
       
        </html>
        <?php

} else {
  header( "location: login.html" );
}
?>