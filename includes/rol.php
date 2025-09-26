<?php
	
	require ('conexion.php');
	
	$queryM = "SELECT idrol,nombre_rol FROM rol ";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option selected disabled value=''>Seleccionar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idrol']."'>".$rowM['nombre_rol']."</option>";
	}
	
	echo $html;
?>	