<?php

require_once('../modelo/modeloReporteInfo.php');

$boton = $_POST['boton'];

switch ($boton) {
   

    case 'mostrarReporteInfo':
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        

        $instancia = new modeloReporteInfo();
        if ($resultado = $instancia->mostrarReporteInfo($fecha_inicio,$fecha_fin)) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    
   
    default:
        # code...
        break;
}
