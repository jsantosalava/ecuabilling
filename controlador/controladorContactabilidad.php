<?php

require_once('../modelo/modeloContactabilidad.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'agregarContactabilidad':
       
        $campania = $_POST['campania'];
        $nombreContactabilidad = $_POST['nombreContactabilidad'];
        
        $user = $_POST['user'];
       
        $instancia = new modeloContactabilidad();
        if ($prueba = $instancia->agregarContactabilidad($campania, $nombreContactabilidad, $user)) {
            echo 'Se agrego correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'mostrarContactabilidad':
    
        $instancia = new modeloContactabilidad();
        if ($resultado = $instancia->mostrarContactabilidad()) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    

    case 'borrarContactabilidad':
        $id = $_POST['id'];
        $user = $_POST['user'];

        $instancia = new modeloContactabilidad();
        if ($prueba = $instancia->borrarContactabilidad($id,$user)) {
            echo 'Se borro correctamente..!';
        } else {
            echo $prueba;
        }
        break;

        // -------------------------------------------------------------------------------------------------------------------
       
    default:
        # code...
        break;
}
