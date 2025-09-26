<?php
session_start();
if ( isset( $_SESSION[ 'INGRESO' ] ) && $_SESSION[ 'INGRESO' ] == 'YES' ) {


    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title></title>
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	<?php
    include("../includes/cdn.php"); 
    ?>
</head>
<body>
	<input type="hidden" id="extension" value="<?php echo  $_SESSION['extension'];?>">
	<input type="hidden" id="user" value="<?php echo  $_SESSION['user'];?>">
	
	<div class="container-fluid">
			<div class="row">
			<?php
    		include("../includes/menu.php"); 
    	?>
    		</div>
<input type="hidden" id="tipo_llamada" value="2">
	    <div class="row p-2">
	    	<div class="col-md-3">
	    		<?php
	    		include("../includes/mod_busqueda.php"); 
	    	?>
	    	</div>
	    	<div class="col-md-4">
	    		<?php
	    		include("../includes/mod_telefonico.php"); 
	    	?>
	    	</div>
	    	<div class="col-md-5">
	    		<?php
	    		include("../includes/mod_gestion.php"); 
	    	?>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-md-12">
	    	<?php
	    		include("../includes/mod_historial.php"); 
	    	?>
	    	</div>
	    </div>
	</div>
</body>

<script src="../js/gestion.js"></script>
<script src="../js/telefono.js"></script>
<script src="../js/actualizar_datos.js"></script>
</html>

        <?php

} else {
  header( "location: login.html" );
}
?>