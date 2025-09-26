<?php

require_once('../modelo/appModels.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'cerrar':
    session_start();
          session_destroy();
        break;
        
    case 'ingresarUsuario':
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $ins = new appmodelo();
        if ($array = $ins->ingresarUsuario($usuario, $password)) {
            echo 1;
        } else {
            echo 'Ingrese correctamente su usuario y contraseña';
        }
        break;

    
    default:
        # code...
        break;
}
