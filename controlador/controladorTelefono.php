<?php

require_once('../modelo/modeloTelefono.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'agregarTelefono':
        $cedula = $_POST['cedula'];
        $numeroTelefono = $_POST['numeroTelefono'];
        $contactoTelefono = $_POST['contactoTelefono'];
        $propietarioTelefono = $_POST['propietarioTelefono'];
        $nombreTelefono = $_POST['nombreTelefono'];
               
        $user = $_POST['user'];
       
        $instancia = new modeloTelefono();
        if ($prueba = $instancia->agregarTelefono($cedula, $numeroTelefono, $contactoTelefono,$propietarioTelefono,$nombreTelefono,$user)) {
            echo 'Se agrego correctamente..!';
        } else {
            return false;
        }
        break;

    case 'mostrarTelefono':
        $cedula = $_POST['cedula'];
        $instancia = new modeloTelefono();
        if ($resultado = $instancia->mostrarTelefono($cedula)) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

        
    case 'actualizarTelefono':

    	$idTelefono = $_POST['idTelefono'];
        
        $numeroTelefono = $_POST['numeroTelefono'];
        $contactoTelefono = $_POST['contactoTelefono'];
        $propietarioTelefono = $_POST['propietarioTelefono'];
        $nombreTelefono = $_POST['nombreTelefono'];

        $user = $_POST['user'];
        
        $instancia = new modeloTelefono();
        if ($prueba = $instancia->actualizarTelefono($idTelefono, $numeroTelefono, $contactoTelefono,$propietarioTelefono,$nombreTelefono, $user)) {
            echo 'Se actualizo Correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'borrarTelefono':
        $id = $_POST['id'];
        $user = $_POST['user'];

        $instancia = new modeloTelefono();
        if ($prueba = $instancia->borrarTelefono($id,$user)) {
            echo 1;
        } else {
            echo 0;
        }
        break;
    default:
        # code...
        break;
}
