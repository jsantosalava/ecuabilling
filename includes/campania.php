<?php
	
    require ('conexion.php');
   
	$queryM = "SELECT idcampania,nombre_campania FROM crm.campania where estado_campania = 1";
	
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option selected disabled value=''>Seleccionar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idcampania']."'>".$rowM['nombre_campania']."</option>";
	}
	
	echo $html;
?>	