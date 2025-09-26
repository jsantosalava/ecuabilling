<?php

require_once('../modelo/modeloReporteGestion.php');

$boton = $_POST['boton'];

switch ($boton) {
   

    case 'mostrarReporteGestion':
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        

        $instancia = new modeloReporteGestion();
        if ($resultado = $instancia->mostrarReporteGestion($fecha_inicio,$fecha_fin)) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    
   
    default:
        # code...
        break;
}
