<?php
	
    require ('conexion.php');
   
	$queryM = "SELECT concat(nombre_agente,' ',apellido_agente) as nombre,extension_agente FROM agente where estado_agente = 1";
	
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option selected disabled value=''>Seleccionar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['extension_agente']."'>".$rowM['nombre']."</option>";
	}
	
	echo $html;
?>	