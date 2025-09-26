<?php
	
    require ('conexion.php');
   
	$queryM = "SELECT idmotivo,nombre_motivo FROM motivo where estado_motivo = 1";
	
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option selected disabled value='0'>Seleccionar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idmotivo']."'>".$rowM['nombre_motivo']."</option>";
	}
	
	echo $html;
?>	