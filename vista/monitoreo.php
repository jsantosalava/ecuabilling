<?php
session_start();
if ( isset( $_SESSION[ 'INGRESO' ] ) && $_SESSION[ 'INGRESO' ] == 'YES'  ) {
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title></title>
	<link rel="stylesheet" href="">
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

						$fechaFinal = date( 'Y-m-d', strtotime( "$fechaFinal + 1 day" ) );
						?>
	<div class="container-fluid p-2">
		<h3 class="text-center">Monitoreo</h3>
			<div class="row p-2">
				<div class="col-md-12">
					<form action="" id="buscar">
					<div class="form-row">
						<div class="form-group col-md-2">
					      <label for="asesor">Asesor</label>
					      <select id="asesor" class="form-control">
					        <option selected>Seleccionar</option>
					        
					      </select>
					    </div>
					    <div class="form-group col-md-2">
					      	<label for="fecha_inicio">Fecha Inicio</label>
					     	<input class='form-control' type="date" id="fecha_inicio" name="fecha_inicio" var value="<?php echo $fechaInicial;?>" required>
					    </div>
					    <div class="form-group col-md-2">
					    	<label for="fecha_fin">Fecha Final</label>
					      	<input class='form-control' type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fechaFinal;?>" required>
					    </div>
					</div>
						
					<button type="submit" class="btn btn-primary">Buscar</button>
					
				</form>
				</div>
				
    		</div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="table-responsive">
				<table id="tabla_monitoreo" class="table tab" >
					<thead>
						<tr>
							<th>FECHA DE GESTIÓN</th>
							<th>CEDULA</th>
							<th>CALL TYPE</th>
							<th>COMENTARIOS</th>
							<th>NUMERO GESTION</th>
							<th></th>
							
							
						</tr>
					</thead>
					
				</table>
			</div>
    			</div>
    		</div>
	</div>
</body>
<script src="../js/monitoreo.js"></script>

</html>

<?php

} else {
  header( "location: login.html" );
}
?>