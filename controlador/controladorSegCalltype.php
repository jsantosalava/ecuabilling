<?php

require_once('../modelo/modeloSegCalltype.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'agregarSegCalltype':
        
       
        $contactabilidad = $_POST['contactabilidad'];
        $segcalltype = $_POST['segcalltype'];
        
        $user = $_POST['user'];
       
        $instancia = new modeloSegCalltype();
        if ($prueba = $instancia->agregarSegCalltype(  $contactabilidad, $segcalltype,$user)) {
            echo 'Se agrego correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'mostrarSegCalltype':
    
        $instancia = new modeloSegCalltype();
        if ($resultado = $instancia->mostrarSegCalltype()) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    

    case 'borrarSegCalltype':
        $id = $_POST['id'];
        $user = $_POST['user'];

        $instancia = new modeloSegCalltype();
        if ($prueba = $instancia->borrarSegCalltype($id,$user)) {
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
