<?php

require_once('../modelo/modeloGestion.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'agregarGestion':
        $tipo_llamada = $_POST['tipo_llamada'];
        $celularGestion = $_POST['celularGestion'];
        $cedCliente = $_POST['cedCliente'];
        $campania = $_POST['campania'];
        $contactabilidad = $_POST['contactabilidad'];
        $segCalltype = $_POST['segCalltype'];
        $callType = $_POST['callType'];
        $motivo = $_POST['motivo'];
        $fechaGestion = $_POST['fechaGestion'];
        $calificacionGestion = $_POST['calificacionGestion'];
        $valorPagar = $_POST['valorPagar'];
        $tipoCliente = $_POST['tipoCliente'];
        $evento = $_POST['evento'];
        $callid = $_POST['callid'];
        $contratoGestion = $_POST['contratoGestion'];
       
        $comentario = $_POST['comentario'];
        $extension = $_POST['extension'];
        
        $user = $_POST['user'];
       
        $instancia = new modeloGestion();
        if ($prueba = $instancia->agregarGestion($tipo_llamada, $celularGestion, $campania,$contactabilidad,
         $segCalltype,$callType,$motivo,$fechaGestion,$calificacionGestion,$valorPagar,$tipoCliente,$evento,$comentario,$user,$cedCliente,$extension,$callid,$contratoGestion)) {
            echo 'Se agrego correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'mostrarHistorial':
        $id = $_POST['id'];
        $instancia = new modeloGestion();
        if ($resultado = $instancia->mostrarHistorial($id)) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

case 'mostrarInfo':
        $id = $_POST['id'];

        $instancia = new modeloGestion();
        if ($resultado = $instancia->mostrarInfo($id)) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;

    case 'mostrarSpeech':
        

        $instancia = new modeloGestion();
        if ($resultado = $instancia->mostrarSpeech()) {
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
        
        $instancia = new modeloGestion();
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

        $instancia = new modeloGestion();
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
