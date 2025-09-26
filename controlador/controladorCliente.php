<?php

require_once('../modelo/modeloCliente.php');

$boton = $_POST['boton'];

switch ($boton) {
    case 'agregarCliente':
        $cliente = $_POST['cliente'];
        $cedula = $_POST['cedula'];
        $fecha = $_POST['fecha'];
        $contrato = $_POST['contrato'];
        $correo = $_POST['correo'];
        $rango = $_POST['rango'];
        $director = $_POST['director'];
        $gerente = $_POST['gerente'];
        $supervisor = $_POST['supervisor'];
        $asesor = $_POST['asesor'];
        $sucursal = $_POST['sucursal'];
        
        $user = $_POST['user'];
       
        $instancia = new modeloCliente();
        if ($prueba = $instancia->agregarCliente($cliente, $cedula, $fecha,$contrato,$correo,$rango,$director,$supervisor,$asesor,$user,$gerente,$sucursal)) {
            echo 'Se agrego correctamente..!';
        } else {
            return false;
        }
        break;

    case 'mostrarCliente':
        
        $instancia = new modeloCliente();
        if ($resultado = $instancia->mostrarCliente()) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;
case 'mostrarInfo':
        $id = $_POST['id'];

        $instancia = new modeloCliente();
        if ($resultado = $instancia->mostrarInfo($id)) {
            echo json_encode($resultado);
        } else {
            echo 0;
        }
        break;
        
    case 'actualizarCliente':
        $cliente = $_POST['cliente'];
        $cedula = $_POST['cedula'];
        $fecha = $_POST['fecha'];
        $contrato = $_POST['contrato'];
        $correo = $_POST['correo'];
        $rango = $_POST['rango'];
        $director = $_POST['director'];
        $gerente = $_POST['gerente'];
        $supervisor = $_POST['supervisor'];
        $asesor = $_POST['asesor'];
        $sucursal = $_POST['sucursal'];

        $user = $_POST['user'];
        
        $instancia = new modeloCliente();
        if ($prueba = $instancia->actualizarCliente($cliente,$cedula, $fecha, $contrato,$correo,$rango,$director,$gerente,$supervisor, $asesor,$sucursal, $user)) {
            echo 'Se actualizo Correctamente..!';
        } else {
            echo $prueba;
        }
        break;

    case 'borrarCliente':
        $id = $_POST['id'];
        $user = $_POST['user'];

        $instancia = new modeloCliente();
        if ($prueba = $instancia->borrarCliente($id,$user)) {
            echo 1;
        } else {
            echo 0;
        }
        break;
    default:
        # code...
        break;
}
