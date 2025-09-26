<?php

require_once('../modelo/modeloCalltype.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'guardarCalltype':
        
       
        $segcalltype = $_POST['segcalltype'];
        $calltype = $_POST['calltype'];
        
        $user = $_POST['user'];
       
        $instancia = new modeloCalltype();
        if ($prueba = $instancia->guardarCalltype(  $segcalltype, $calltype,$user)) {
            echo 'Se agrego correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'mostrarCalltype':
    
        $instancia = new modeloCalltype();
        if ($resultado = $instancia->mostrarCalltype()) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    

    case 'borrarCalltype':
        $id = $_POST['id'];
        $user = $_POST['user'];

        $instancia = new modeloCalltype();
        if ($prueba = $instancia->borrarCalltype($id,$user)) {
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
