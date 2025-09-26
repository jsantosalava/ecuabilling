<?php
	
    require ('conexion.php');
   	
   	$idnivel1_select = $_POST['idnivel1_select'];

	$queryM = "SELECT idcontactabilidad,nombre_contactabilidad,nombre_campania FROM contactabilidad left join campania on idcampania_contactabilidad = idcampania where estado_contactabilidad = 1 and idcampania = $idnivel1_select";
	
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option selected disabled value=''>Seleccionar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idcontactabilidad']."'>".$rowM['nombre_contactabilidad']."</option>";
	}
	
	echo $html;
?>	