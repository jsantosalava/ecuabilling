<?php

require_once('../modelo/modeloMotivo.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'agregarMotivo':
        $nombreMotivo = $_POST['nombreMotivo'];
       
        $user = $_POST['user'];
       
        $instancia = new modeloMotivo();
        if ($prueba = $instancia->agregarMotivo($nombreMotivo, $user)) {
            echo 'Se agrego correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'mostrarMotivo':
    
        $instancia = new modeloMotivo();
        if ($resultado = $instancia->mostrarMotivo()) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    

    case 'borrarMotivo':
        $id = $_POST['id'];
        $user = $_POST['user'];

        $instancia = new modeloMotivo();
        if ($prueba = $instancia->borrarMotivo($id,$user)) {
            echo 'Se borro correctamente..!';
        } else {
            echo 0;
        }
        break;

        // -------------------------------------------------------------------------------------------------------------------
       
    default:
        # code...
        break;
}
