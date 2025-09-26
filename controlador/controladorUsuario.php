<?php

require_once('../modelo/modeloUsuario.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'agregarUsuario':
        $nombreUsuario = $_POST['nombreUsuario'];
        $apellidoUsuario = $_POST['apellidoUsuario'];
        $cedulaUsuario = $_POST['cedulaUsuario'];
        
        $usuarioUs = $_POST['usuarioUs'];
        $extension = $_POST['extension'];
       
        $rolUsuario = $_POST['rolUsuario'];
        $passUsuario = $_POST['passUsuario'];
        
        
        $user = $_POST['user'];
       
        $instancia = new modeloUsuario();
        if ($prueba = $instancia->agregarUsuario($nombreUsuario, $apellidoUsuario, $cedulaUsuario,$usuarioUs,
         $rolUsuario,$passUsuario,$user,$extension)) {
            echo 'Se agrego correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'mostrarUsuario':
        
        $instancia = new modeloUsuario();
        if ($resultado = $instancia->mostrarUsuario()) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;
case 'mostrarInfo':
        $id = $_POST['id'];

        $instancia = new modeloUsuario();
        if ($resultado = $instancia->mostrarInfo($id)) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;
        
    case 'actualizarUsuario':
        $id = $_POST['id'];
        $nombreUsuario = $_POST['nombreUsuario'];
        $apellidoUsuario = $_POST['apellidoUsuario'];
        $cedulaUsuario = $_POST['cedulaUsuario'];
        
        $extension = $_POST['extension'];
        $usuarioUs = $_POST['usuarioUs'];
       
        $rolUsuario = $_POST['rolUsuario'];
        $passUsuario = $_POST['passUsuario'];
        
        
        $user = $_POST['user'];
        
        $instancia = new modeloUsuario();
        if ($prueba = $instancia->actualizarUsuario($id,$nombreUsuario, $apellidoUsuario, $cedulaUsuario,$usuarioUs,
         $rolUsuario,$passUsuario,$user,$extension)) {
            echo 'Se actualizo Correctamente..!';
        } else {
            echo 0;
        }
        break;

    case 'borrarUsuario':
        $id = $_POST['id'];
        $user = $_POST['user'];

        $instancia = new modeloUsuario();
        if ($prueba = $instancia->borrarUsuario($id,$user)) {
            echo 1;
        } else {
            echo 0;
        }
        break;
    default:
        # code...
        break;
}
