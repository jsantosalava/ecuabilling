<?php

require_once('../modelo/modeloSpeech.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'agregarCampania':
        $nombreCampania = $_POST['nombreCampania'];
        $tipo = $_POST['tipo'];
       
        $user = $_POST['user'];
       
        $instancia = new modeloCampania();
        if ($prueba = $instancia->agregarCampania($nombreCampania,$tipo, $user)) {
            echo 'Se agrego correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'mostrarCampania':
    
        $instancia = new modeloCampania();
        if ($resultado = $instancia->mostrarCampania()) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    

    case 'borrarCampania':
        $id = $_POST['id'];
        $user = $_POST['user'];

        $instancia = new modeloCampania();
        if ($prueba = $instancia->borrarCampania($id,$user)) {
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
