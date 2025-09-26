<?php
	
    require ('conexion.php');
   	
   	$idnivel1_select = $_POST['idnivel1_select'];

	$queryM = "SELECT idsegcalltype,nombre_segcalltype FROM segcalltype where estado_segcalltype = 1 and idcontactabilidad_segcalltype = $idnivel1_select";
	
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option selected disabled value=''>Seleccionar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idsegcalltype']."'>".$rowM['nombre_segcalltype']."</option>";
	}
	
	echo $html;
?>	