<?php

require_once('../modelo/modeloMonitoreo.php');

$boton = $_POST['boton'];

switch ($boton) {
   

    case 'mostrarMonitoreo':
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $asesor = $_POST['asesor'];

        $instancia = new modeloMonitoreo();
        if ($resultado = $instancia->mostrarMonitoreo($fecha_inicio,$fecha_fin,$asesor)) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    
   
    default:
        # code...
        break;
}
