<?php
	
    require ('conexion.php');
   	
   	$idnivel1_select = $_POST['idnivel1_select'];

	$queryM = "SELECT idcalltype,nombre_calltype FROM crm.calltype where estado_calltype = 1 and idsegcalltype_calltype = $idnivel1_select";
	
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option selected disabled value=''>Seleccionar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idcalltype']."'>".$rowM['nombre_calltype']."</option>";
	}
	
	echo $html;
?>	